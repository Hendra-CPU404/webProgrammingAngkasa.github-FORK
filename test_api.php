<?php
echo "🧪 Testing StyleHub Fashion API\n";
echo "================================\n\n";

// Test if API file exists
if (!file_exists('fashion_api.php')) {
    echo "❌ fashion_api.php not found!\n";
    exit(1);
}

echo "✅ API file exists\n";

// Test data file creation
echo "🔍 Testing data file creation...\n";

// Include the API to trigger data file creation
ob_start();
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['PATH_INFO'] = '';
include 'fashion_api.php';
$output = ob_get_clean();

if (file_exists('fashion_data.json')) {
    echo "✅ Data file created successfully\n";
    
    // Test data content
    $data = json_decode(file_get_contents('fashion_data.json'), true);
    
    if (isset($data['styles']) && is_array($data['styles'])) {
        echo "✅ Styles data: " . count($data['styles']) . " items\n";
    } else {
        echo "❌ Styles data not found\n";
    }
    
    if (isset($data['lookbook']) && is_array($data['lookbook'])) {
        echo "✅ Lookbook data: " . count($data['lookbook']) . " items\n";
    } else {
        echo "❌ Lookbook data not found\n";
    }
    
    if (isset($data['trends']) && is_array($data['trends'])) {
        echo "✅ Trends data: " . count($data['trends']) . " items\n";
    } else {
        echo "❌ Trends data not found\n";
    }
    
} else {
    echo "❌ Data file creation failed\n";
}

echo "\n🎉 API Test Complete!\n";
echo "\n📋 Next Steps:\n";
echo "1. Run: ./start_server.sh\n";
echo "2. Open: http://localhost:8000/fashion_app_dynamic.html\n";
echo "3. Admin: http://localhost:8000/admin.html\n";
?>