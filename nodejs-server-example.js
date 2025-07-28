// server.js - Node.js/Express server untuk EJS company profile
const express = require('express');
const axios = require('axios');
const app = express();
const PORT = process.env.PORT || 3000;

// Set EJS sebagai view engine
app.set('view engine', 'ejs');
app.set('views', './views');

// Middleware
app.use(express.static('public'));
app.use(express.json());

// API Configuration
const API_CONFIG = {
    baseUrl: 'http://localhost:8000/api', // Ganti dengan URL Laravel Anda
    timeout: 10000,
    headers: {
        'Accept': 'application/json',
        'User-Agent': 'CompanyProfile/1.0',
        'Origin': 'http://localhost:3000'
    }
};

// Function untuk fetch campaigns dari Laravel API
async function fetchCampaigns(limit = 6) {
    try {
        const response = await axios.get(`${API_CONFIG.baseUrl}/campaigns/featured`, {
            params: { limit },
            timeout: API_CONFIG.timeout,
            headers: API_CONFIG.headers
        });

        if (response.data.success) {
            return {
                success: true,
                campaigns: response.data.data.map(campaign => ({
                    id: campaign.id,
                    title: campaign.title,
                    description: campaign.description,
                    category: campaign.kategori,
                    target_formatted: formatCurrency(campaign.target_amount),
                    location: campaign.lokasi,
                    image: campaign.image,
                    donation_url: `http://localhost:8000/program/${campaign.id}`, // URL ke Laravel
                    cta_text: 'Donasi Sekarang'
                }))
            };
        } else {
            throw new Error('API returned error: ' + response.data.message);
        }
    } catch (error) {
        console.error('Error fetching campaigns:', error.message);
        return {
            success: false,
            error: error.message,
            campaigns: []
        };
    }
}

// Function untuk format currency
function formatCurrency(amount) {
    if (!amount) return 'Target tidak tersedia';
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(amount);
}

// Routes
app.get('/', async (req, res) => {
    const campaignData = await fetchCampaigns(6);
    
    res.render('index', {
        title: 'PT. Example Company - Berbagi Kebaikan',
        campaigns: campaignData.campaigns,
        apiSuccess: campaignData.success,
        errorMessage: campaignData.error || null
    });
});

app.get('/donasi', async (req, res) => {
    const campaignData = await fetchCampaigns(12);
    
    res.render('donasi', {
        title: 'Program Donasi - PT. Example Company',
        campaigns: campaignData.campaigns,
        apiSuccess: campaignData.success,
        errorMessage: campaignData.error || null
    });
});

// API proxy endpoint untuk frontend AJAX
app.get('/api/campaigns', async (req, res) => {
    const { limit = 10, kategori } = req.query;
    
    try {
        let url = `${API_CONFIG.baseUrl}/campaigns`;
        if (kategori) {
            url += `?kategori=${encodeURIComponent(kategori)}`;
        }
        
        const response = await axios.get(url, {
            params: { limit },
            timeout: API_CONFIG.timeout,
            headers: API_CONFIG.headers
        });
        
        res.json(response.data);
    } catch (error) {
        res.status(500).json({
            success: false,
            message: 'Error fetching campaigns',
            error: error.message
        });
    }
});

// Health check endpoint
app.get('/health', (req, res) => {
    res.json({
        status: 'OK',
        timestamp: new Date().toISOString(),
        uptime: process.uptime()
    });
});

// Error handling middleware
app.use((err, req, res, next) => {
    console.error('Error:', err);
    res.status(500).render('error', {
        title: 'Error - PT. Example Company',
        message: 'Terjadi kesalahan pada server',
        error: process.env.NODE_ENV === 'development' ? err : {}
    });
});

// 404 handler
app.use((req, res) => {
    res.status(404).render('404', {
        title: '404 - Halaman Tidak Ditemukan',
        message: 'Halaman yang Anda cari tidak ditemukan'
    });
});

// Start server
app.listen(PORT, () => {
    console.log(`🚀 Company Profile Server running on http://localhost:${PORT}`);
    console.log(`📡 Laravel API endpoint: ${API_CONFIG.baseUrl}`);
    console.log(`📁 Views directory: ${app.get('views')}`);
});

module.exports = app;
