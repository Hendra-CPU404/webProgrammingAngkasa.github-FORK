#!/bin/bash

echo "🚀 Starting StyleHub Fashion App Server..."
echo "📁 Project Directory: $(pwd)"
echo "🌐 Server URL: http://localhost:8000"
echo ""
echo "📖 Available Pages:"
echo "   • Main App (Dynamic): http://localhost:8000/fashion_app_dynamic.html"
echo "   • Main App (Static):  http://localhost:8000/fashion_app.html"
echo "   • Admin Panel:        http://localhost:8000/admin.html"
echo "   • API Endpoint:       http://localhost:8000/fashion_api.php"
echo ""
echo "🔧 To stop server: Ctrl+C"
echo "📚 Documentation: README.md"
echo ""
echo "Starting PHP Development Server..."

# Start PHP development server
php -S localhost:8000