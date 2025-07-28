// server.js - Contoh backend Node.js/Express dengan EJS untuk menggunakan API Laravel

const express = require('express');
const axios = require('axios');
const path = require('path');

const app = express();
const PORT = process.env.PORT || 3000;

// KONFIGURASI API LARAVEL
const LARAVEL_API = {
    baseUrl: 'http://localhost:8000', // URL website donasi Laravel Anda
    endpoints: {
        campaigns: '/api/campaigns',
        featuredCampaigns: '/api/campaigns/featured',
        programShow: '/api/programs',
        zakat: '/api/zakat'
    },
    timeout: 10000
};

// Setup EJS
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.use(express.static(path.join(__dirname, 'public')));

// Helper function untuk call API Laravel
async function fetchFromLaravelAPI(endpoint, params = {}) {
    try {
        const url = `${LARAVEL_API.baseUrl}${endpoint}`;
        const response = await axios.get(url, {
            params: {
                base_url: LARAVEL_API.baseUrl,
                ...params
            },
            timeout: LARAVEL_API.timeout,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        });

        return response.data;
    } catch (error) {
        console.error(`Error fetching from ${endpoint}:`, error.message);
        return {
            success: false,
            message: error.message,
            data: null
        };
    }
}

// Route Homepage
app.get('/', async (req, res) => {
    try {
        // Fetch featured campaigns dari Laravel API
        const apiResponse = await fetchFromLaravelAPI(LARAVEL_API.endpoints.featuredCampaigns, {
            limit: 3
        });

        const campaigns = apiResponse.success ? apiResponse.data.featured_campaigns : [];

        res.render('index', {
            title: 'Company Profile - Home',
            campaigns: campaigns,
            apiSuccess: apiResponse.success,
            errorMessage: apiResponse.message || null
        });
    } catch (error) {
        console.error('Homepage error:', error);
        res.render('index', {
            title: 'Company Profile - Home',
            campaigns: [],
            apiSuccess: false,
            errorMessage: 'Gagal memuat data'
        });
    }
});

// Route Donasi Page
app.get('/donasi', async (req, res) => {
    try {
        const limit = req.query.limit || 6;
        
        // Fetch campaigns dari Laravel API
        const apiResponse = await fetchFromLaravelAPI(LARAVEL_API.endpoints.campaigns, {
            limit: limit
        });

        const campaigns = apiResponse.success ? apiResponse.data.campaigns : [];

        res.render('donasi', {
            title: 'Program Donasi',
            campaigns: campaigns,
            apiSuccess: apiResponse.success,
            errorMessage: apiResponse.message || null,
            totalCampaigns: apiResponse.success ? apiResponse.data.total : 0
        });
    } catch (error) {
        console.error('Donasi page error:', error);
        res.render('donasi', {
            title: 'Program Donasi',
            campaigns: [],
            apiSuccess: false,
            errorMessage: 'Gagal memuat data donasi',
            totalCampaigns: 0
        });
    }
});

// Route untuk get campaign by ID (untuk redirect ke Laravel)
app.get('/campaign/:id', async (req, res) => {
    const campaignId = req.params.id;
    
    try {
        // Fetch detail campaign dari Laravel API
        const apiResponse = await fetchFromLaravelAPI(`${LARAVEL_API.endpoints.programShow}/${campaignId}`);

        if (apiResponse.success) {
            // Redirect ke website Laravel untuk proses donasi
            const donationUrl = `${LARAVEL_API.baseUrl}/program/${campaignId}`;
            res.redirect(donationUrl);
        } else {
            res.status(404).render('error', {
                title: 'Campaign Tidak Ditemukan',
                message: 'Campaign yang Anda cari tidak ditemukan.',
                errorCode: 404
            });
        }
    } catch (error) {
        console.error('Campaign redirect error:', error);
        res.status(500).render('error', {
            title: 'Server Error',
            message: 'Terjadi kesalahan saat memuat campaign.',
            errorCode: 500
        });
    }
});

// API Route untuk AJAX calls dari frontend
app.get('/api/campaigns', async (req, res) => {
    try {
        const limit = req.query.limit || 6;
        const apiResponse = await fetchFromLaravelAPI(LARAVEL_API.endpoints.campaigns, {
            limit: limit
        });

        res.json(apiResponse);
    } catch (error) {
        res.status(500).json({
            success: false,
            message: 'Internal server error',
            data: null
        });
    }
});

// Route untuk zakat calculator
app.get('/zakat/:jenis?', async (req, res) => {
    try {
        const jenisZakat = req.params.jenis || 'maal';
        
        const apiResponse = await fetchFromLaravelAPI(`${LARAVEL_API.endpoints.zakat}/${jenisZakat}`);

        res.render('zakat', {
            title: `Zakat ${jenisZakat.charAt(0).toUpperCase() + jenisZakat.slice(1)}`,
            jenisZakat: jenisZakat,
            zakatData: apiResponse.success ? apiResponse.data : null,
            apiSuccess: apiResponse.success,
            errorMessage: apiResponse.message || null
        });
    } catch (error) {
        console.error('Zakat page error:', error);
        res.render('zakat', {
            title: 'Zakat',
            jenisZakat: 'maal',
            zakatData: null,
            apiSuccess: false,
            errorMessage: 'Gagal memuat data zakat'
        });
    }
});

// Error handling middleware
app.use((req, res) => {
    res.status(404).render('error', {
        title: '404 - Halaman Tidak Ditemukan',
        message: 'Halaman yang Anda cari tidak ditemukan.',
        errorCode: 404
    });
});

app.use((error, req, res, next) => {
    console.error('Global error:', error);
    res.status(500).render('error', {
        title: '500 - Server Error',
        message: 'Terjadi kesalahan pada server.',
        errorCode: 500
    });
});

// Start server
app.listen(PORT, () => {
    console.log(`🚀 Server running on http://localhost:${PORT}`);
    console.log(`📡 Laravel API: ${LARAVEL_API.baseUrl}`);
});

module.exports = app;
