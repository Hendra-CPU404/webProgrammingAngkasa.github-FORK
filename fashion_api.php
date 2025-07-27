<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

// Database configuration (using JSON file for simplicity)
$dataFile = 'fashion_data.json';

// Initialize data file if it doesn't exist
if (!file_exists($dataFile)) {
    $initialData = [
        'styles' => [
            [
                'id' => 1,
                'name' => 'Dark Skena',
                'category' => 'skena',
                'description' => 'Style underground dengan nuansa dark dan mysterious. Perfect untuk yang suka tampil beda dan ekspresif.',
                'tags' => ['dark', 'gothic', 'alternative', 'underground'],
                'icon' => '🖤',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => 'Urban Casual',
                'category' => 'casual',
                'description' => 'Kombinasi comfort dan style untuk daily wear. Cocok untuk hangout, kuliah, atau aktivitas santai.',
                'tags' => ['comfortable', 'daily', 'versatile', 'trendy'],
                'icon' => '👕',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'name' => 'Premium Streetwear',
                'category' => 'streetwear',
                'description' => 'High-end streetwear dengan brand premium. Menggabungkan luxury dengan street culture.',
                'tags' => ['premium', 'hypebeast', 'limited', 'exclusive'],
                'icon' => '👟',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ],
        'lookbook' => [
            [
                'id' => 1,
                'title' => 'Winter Skena Vibes',
                'description' => 'Dark winter outfit dengan layer yang perfect',
                'category' => 'skena',
                'icon' => '❄️',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'title' => 'Casual Friday Look',
                'description' => 'Relaxed tapi tetap stylish untuk akhir pekan',
                'category' => 'casual',
                'icon' => '☀️',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'title' => 'Hype Drop Collection',
                'description' => 'Latest drops dari brand streetwear ternama',
                'category' => 'streetwear',
                'icon' => '🔥',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ],
        'trends' => [
            [
                'id' => 1,
                'title' => 'Y2K Revival',
                'description' => 'Trend fashion 2000an yang kembali populer',
                'popularity' => 95,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'title' => 'Sustainable Fashion',
                'description' => 'Fashion ramah lingkungan semakin diminati',
                'popularity' => 88,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]
    ];
    file_put_contents($dataFile, json_encode($initialData, JSON_PRETTY_PRINT));
}

// Helper functions
function loadData() {
    global $dataFile;
    return json_decode(file_get_contents($dataFile), true);
}

function saveData($data) {
    global $dataFile;
    return file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
}

function getCategoryIcon($category) {
    $icons = [
        'skena' => '🖤',
        'casual' => '👕',
        'streetwear' => '👟',
        'vintage' => '🕰️',
        'minimalist' => '⚪',
        'grunge' => '🎸',
        'kawaii' => '🌸',
        'punk' => '⚡',
        'bohemian' => '🌙',
        'preppy' => '📚'
    ];
    return $icons[$category] ?? '✨';
}

function getNextId($items) {
    if (empty($items)) return 1;
    return max(array_column($items, 'id')) + 1;
}

// Handle different HTTP methods
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'] ?? '', '/'));
$type = $request[0] ?? '';
$id = $request[1] ?? null;

$data = loadData();

switch ($method) {
    case 'GET':
        if ($type === 'styles') {
            if ($id) {
                $style = array_filter($data['styles'], fn($s) => $s['id'] == $id);
                echo json_encode(array_values($style)[0] ?? null);
            } else {
                echo json_encode($data['styles']);
            }
        } elseif ($type === 'lookbook') {
            if ($id) {
                $item = array_filter($data['lookbook'], fn($l) => $l['id'] == $id);
                echo json_encode(array_values($item)[0] ?? null);
            } else {
                echo json_encode($data['lookbook']);
            }
        } elseif ($type === 'trends') {
            echo json_encode($data['trends']);
        } elseif ($type === 'categories') {
            $categories = array_unique(array_column($data['styles'], 'category'));
            echo json_encode($categories);
        } else {
            echo json_encode($data);
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        
        if ($type === 'styles') {
            $newStyle = [
                'id' => getNextId($data['styles']),
                'name' => $input['name'],
                'category' => $input['category'],
                'description' => $input['description'],
                'tags' => explode(',', $input['tags']),
                'icon' => getCategoryIcon($input['category']),
                'created_at' => date('Y-m-d H:i:s')
            ];
            $data['styles'][] = $newStyle;
            saveData($data);
            echo json_encode(['success' => true, 'data' => $newStyle]);
            
        } elseif ($type === 'lookbook') {
            $newLookbook = [
                'id' => getNextId($data['lookbook']),
                'title' => $input['title'],
                'description' => $input['description'],
                'category' => $input['category'],
                'icon' => getCategoryIcon($input['category']),
                'created_at' => date('Y-m-d H:i:s')
            ];
            $data['lookbook'][] = $newLookbook;
            saveData($data);
            echo json_encode(['success' => true, 'data' => $newLookbook]);
            
        } elseif ($type === 'trends') {
            $newTrend = [
                'id' => getNextId($data['trends']),
                'title' => $input['title'],
                'description' => $input['description'],
                'popularity' => $input['popularity'] ?? 50,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $data['trends'][] = $newTrend;
            saveData($data);
            echo json_encode(['success' => true, 'data' => $newTrend]);
        }
        break;

    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        
        if ($type === 'styles' && $id) {
            foreach ($data['styles'] as &$style) {
                if ($style['id'] == $id) {
                    $style['name'] = $input['name'] ?? $style['name'];
                    $style['category'] = $input['category'] ?? $style['category'];
                    $style['description'] = $input['description'] ?? $style['description'];
                    $style['tags'] = isset($input['tags']) ? explode(',', $input['tags']) : $style['tags'];
                    $style['icon'] = getCategoryIcon($style['category']);
                    $style['updated_at'] = date('Y-m-d H:i:s');
                    break;
                }
            }
            saveData($data);
            echo json_encode(['success' => true]);
        }
        break;

    case 'DELETE':
        if ($type === 'styles' && $id) {
            $data['styles'] = array_filter($data['styles'], fn($s) => $s['id'] != $id);
            $data['styles'] = array_values($data['styles']);
            saveData($data);
            echo json_encode(['success' => true]);
            
        } elseif ($type === 'lookbook' && $id) {
            $data['lookbook'] = array_filter($data['lookbook'], fn($l) => $l['id'] != $id);
            $data['lookbook'] = array_values($data['lookbook']);
            saveData($data);
            echo json_encode(['success' => true]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>