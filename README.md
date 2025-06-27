<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Todo API Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #4f46e5;
            --dark: #1e293b;
            --light: #f8fafc;
            --success: #10b981;
        }
        
        body {
            background-color: #f5f7fb;
            color: #334155;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .sidebar {
            background: linear-gradient(180deg, var(--primary), var(--secondary));
            color: white;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
        }
        
        .sidebar .logo {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            border-radius: 5px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .main-content {
            margin-left: 280px;
            padding: 30px;
        }
        
        .header {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .section-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .section-header {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            color: white;
            padding: 15px 20px;
        }
        
        .section-body {
            padding: 25px;
        }
        
        .endpoint-card {
            border-left: 4px solid var(--primary);
            background-color: #f8fafc;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .endpoint-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .method {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 14px;
        }
        
        .method.get { background-color: #10b981; color: white; }
        .method.post { background-color: #f59e0b; color: white; }
        .method.put { background-color: #3b82f6; color: white; }
        .method.delete { background-color: #ef4444; color: white; }
        
        .code-block {
            background-color: var(--dark);
            color: #e2e8f0;
            padding: 15px;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            overflow-x: auto;
            margin: 15px 0;
        }
        
        .code-block .json-key { color: #f87171; }
        .code-block .json-value { color: #60a5fa; }
        .code-block .json-string { color: #34d399; }
        
        .feature-icon {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .tech-badge {
            background-color: #e0e7ff;
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 20px;
            margin: 5px;
            display: inline-block;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="logo">
                    <h3><i class="fas fa-check-circle me-2"></i>Todo API</h3>
                </div>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link active" href="#overview"><i class="fas fa-home me-2"></i>Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features"><i class="fas fa-star me-2"></i>Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#installation"><i class="fas fa-download me-2"></i>Installation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#authentication"><i class="fas fa-lock me-2"></i>Authentication</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tasks"><i class="fas fa-tasks me-2"></i>Tasks API</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#notifications"><i class="fas fa-bell me-2"></i>Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#examples"><i class="fas fa-code me-2"></i>Examples</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="header">
                    <h1 class="display-4">Laravel Todo API Documentation</h1>
                    <p class="lead">A comprehensive guide to using the Todo API built with Laravel and JWT Authentication</p>
                    <div class="d-flex mt-4">
                        <span class="tech-badge"><i class="fab fa-php me-2"></i>PHP 8.0.30</span>
                        <span class="tech-badge"><i class="fab fa-laravel me-2"></i>Laravel</span>
                        <span class="tech-badge"><i class="fas fa-database me-2"></i>MySQL</span>
                        <span class="tech-badge"><i class="fas fa-key me-2"></i>JWT Authentication</span>
                    </div>
                </div>

                <!-- Overview Section -->
                <div id="overview" class="section-card">
                    <div class="section-header">
                        <h2><i class="fas fa-home me-2"></i>Overview</h2>
                    </div>
                    <div class="section-body">
                        <p>The Laravel Todo API is a robust backend system for managing tasks, users, and notifications. Built with Laravel and secured with JWT authentication, it provides all the necessary endpoints for a full-featured todo application.</p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h4>Core Functionality</h4>
                                <ul>
                                    <li>User registration and authentication</li>
                                    <li>Full CRUD operations for tasks</li>
                                    <li>Notification management</li>
                                    <li>JWT-based protected routes</li>
                                    <li>RESTful API design</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>Technical Stack</h4>
                                <ul>
                                    <li>PHP 8.0.30</li>
                                    <li>Laravel Framework</li>
                                    <li>tymon/jwt-auth for authentication</li>
                                    <li>MySQL Database</li>
                                    <li>Laravel Notifications</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div id="features" class="section-card">
                    <div class="section-header">
                        <h2><i class="fas fa-star me-2"></i>Features</h2>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="text-center">
                                    <div class="feature-icon mx-auto">
                                        <i class="fas fa-user-lock fa-2x text-white"></i>
                                    </div>
                                    <h4>JWT Authentication</h4>
                                    <p>Secure user authentication using JSON Web Tokens with registration and login endpoints.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="text-center">
                                    <div class="feature-icon mx-auto">
                                        <i class="fas fa-tasks fa-2x text-white"></i>
                                    </div>
                                    <h4>Task Management</h4>
                                    <p>Full CRUD operations for tasks with endpoints for creating, reading, updating, and deleting tasks.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="text-center">
                                    <div class="feature-icon mx-auto">
                                        <i class="fas fa-bell fa-2x text-white"></i>
                                    </div>
                                    <h4>Notifications</h4>
                                    <p>Notification handling with endpoints to mark notifications as read.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Installation Section -->
                <div id="installation" class="section-card">
                    <div class="section-header">
                        <h2><i class="fas fa-download me-2"></i>Installation</h2>
                    </div>
                    <div class="section-body">
                        <h4>Requirements</h4>
                        <ul>
                            <li>PHP 8.0+</li>
                            <li>Composer</li>
                            <li>MySQL 5.7+</li>
                        </ul>
                        
                        <h4 class="mt-4">Setup Instructions</h4>
                        <ol>
                            <li>Clone the repository:
                                <div class="code-block">git clone https://github.com/yourusername/laravel-todo-api.git</div>
                            </li>
                            <li>Install dependencies:
                                <div class="code-block">composer install</div>
                            </li>
                            <li>Create environment file and generate key:
                                <div class="code-block">cp .env.example .env
php artisan key:generate</div>
                            </li>
                            <li>Configure database settings in <code>.env</code> file</li>
                            <li>Generate JWT secret:
                                <div class="code-block">php artisan jwt:secret</div>
                            </li>
                            <li>Run migrations:
                                <div class="code-block">php artisan migrate</div>
                            </li>
                            <li>Start the development server:
                                <div class="code-block">php artisan serve</div>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Authentication Section -->
                <div id="authentication" class="section-card">
                    <div class="section-header">
                        <h2><i class="fas fa-lock me-2"></i>Authentication</h2>
                    </div>
                    <div class="section-body">
                        <p>All endpoints except registration and login require JWT authentication. Include the token in the Authorization header:</p>
                        <div class="code-block">Authorization: Bearer <span class="json-key">your_jwt_token_here</span></div>
                        
                        <div class="endpoint-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>User Registration</h4>
                                <span class="method post">POST</span>
                            </div>
                            <p class="text-muted">Register a new user account</p>
                            <p><strong>Endpoint:</strong> <code>/api/auth/register</code></p>
                            
                            <h5>Request Body</h5>
                            <div class="code-block">
{
  "<span class="json-key">full_name</span>": "<span class="json-value">Test User</span>",
  "<span class="json-key">email</span>": "<span class="json-value">test@example.com</span>", 
  "<span class="json-key">phone_number</span>": "<span class="json-value">1234567890</span>",
  "<span class="json-key">address</span>": "<span class="json-value">Test Address</span>",
  "<span class="json-key">password</span>": "<span class="json-value">password123</span>",
  "<span class="json-key">password_confirmation</span>": "<span class="json-value">password123</span>",
  "<span class="json-key">image</span>": <span class="json-value">null</span>
}
                            </div>
                            
                            <h5>Response</h5>
                            <div class="code-block">
{
  "<span class="json-key">success</span>": <span class="json-value">true</span>,
  "<span class="json-key">message</span>": "<span class="json-value">Utilisateur créé avec succès</span>",
  "<span class="json-key">data</span>": {
    "<span class="json-key">user</span>": {
      "<span class="json-key">full_name</span>": "<span class="json-value">Test User</span>",
      "<span class="json-key">email</span>": "<span class="json-value">test@example.com</span>",
      "<span class="json-key">phone_number</span>": "<span class="json-value">1234567890</span>",
      "<span class="json-key">address</span>": "<span class="json-value">Test Address</span>",
      "<span class="json-key">updated_at</span>": "<span class="json-value">2025-06-27T11:38:09.000000Z</span>",
      "<span class="json-key">created_at</span>": "<span class="json-value">2025-06-27T11:38:09.000000Z</span>",
      "<span class="json-key">id</span>": <span class="json-value">1</span>
    },
    "<span class="json-key">token</span>": "<span class="json-value">eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...</span>"
  }
}
                            </div>
                        </div>
                        
                        <div class="endpoint-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>User Login</h4>
                                <span class="method post">POST</span>
                            </div>
                            <p class="text-muted">Authenticate and receive JWT token</p>
                            <p><strong>Endpoint:</strong> <code>/api/auth/login</code></p>
                            
                            <h5>Request Body</h5>
                            <div class="code-block">
{
  "<span class="json-key">email</span>": "<span class="json-value">test@example.com</span>", 
  "<span class="json-key">password</span>": "<span class="json-value">password123</span>"  
}
                            </div>
                            
                            <h5>Response</h5>
                            <div class="code-block">
{
  "<span class="json-key">success</span>": <span class="json-value">true</span>,
  "<span class="json-key">message</span>": "<span class="json-value">Connexion réussie</span>",
  "<span class="json-key">data</span>": {
    "<span class="json-key">token</span>": "<span class="json-value">eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...</span>",
    "<span class="json-key">user</span>": {
      "<span class="json-key">id</span>": <span class="json-value">1</span>,
      "<span class="json-key">full_name</span>": "<span class="json-value">Test User</span>",
      "<span class="json-key">email</span>": "<span class="json-value">test@example.com</span>",
      "<span class="json-key">phone_number</span>": "<span class="json-value">1234567890</span>",
      "<span class="json-key">address</span>": "<span class="json-value">Test Address</span>",
      "<span class="json-key">image</span>": <span class="json-value">null</span>,
      "<span class="json-key">email_verified_at</span>": <span class="json-value">null</span>,
      "<span class="json-key">created_at</span>": "<span class="json-value">2025-06-27T11:38:09.000000Z</span>",
      "<span class="json-key">updated_at</span>": "<span class="json-value">2025-06-27T11:38:09.000000Z</span>"
    }
  }
}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tasks Section -->
                <div id="tasks" class="section-card">
                    <div class="section-header">
                        <h2><i class="fas fa-tasks me-2"></i>Tasks API</h2>
                    </div>
                    <div class="section-body">
                        <p>All task endpoints require JWT authentication. Include the token in the Authorization header.</p>
                        
                        <div class="endpoint-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Create Task</h4>
                                <span class="method post">POST</span>
                            </div>
                            <p class="text-muted">Create a new task</p>
                            <p><strong>Endpoint:</strong> <code>/api/tasks</code></p>
                            
                            <h5>Request Body</h5>
                            <div class="code-block">
{
  "<span class="json-key">title</span>": "<span class="json-value">Complete API Documentation</span>",
  "<span class="json-key">description</span>": "<span class="json-value">Create comprehensive API documentation for Todo project</span>",
  "<span class="json-key">due_date</span>": "<span class="json-value">2023-12-31</span>",
  "<span class="json-key">priority</span>": "<span class="json-value">high</span>"
}
                            </div>
                        </div>
                        
                        <div class="endpoint-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>List Tasks</h4>
                                <span class="method get">GET</span>
                            </div>
                            <p class="text-muted">Get all tasks for the authenticated user</p>
                            <p><strong>Endpoint:</strong> <code>/api/tasks</code></p>
                        </div>
                        
                        <div class="endpoint-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Get Task</h4>
                                <span class="method get">GET</span>
                            </div>
                            <p class="text-muted">Get a specific task by ID</p>
                            <p><strong>Endpoint:</strong> <code>/api/tasks/{id}</code></p>
                        </div>
                        
                        <div class="endpoint-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Update Task</h4>
                                <span class="method put">PUT</span>
                            </div>
                            <p class="text-muted">Update a task</p>
                            <p><strong>Endpoint:</strong> <code>/api/tasks/{id}</code></p>
                        </div>
                        
                        <div class="endpoint-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Delete Task</h4>
                                <span class="method delete">DELETE</span>
                            </div>
                            <p class="text-muted">Delete a task</p>
                            <p><strong>Endpoint:</strong> <code>/api/tasks/{id}</code></p>
                        </div>
                    </div>
                </div>

                <!-- Notifications Section -->
                <div id="notifications" class="section-card">
                    <div class="section-header">
                        <h2><i class="fas fa-bell me-2"></i>Notifications</h2>
                    </div>
                    <div class="section-body">
                        <div class="endpoint-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Mark Notification as Read</h4>
                                <span class="method post">POST</span>
                            </div>
                            <p class="text-muted">Mark a specific notification as read</p>
                            <p><strong>Endpoint:</strong> <code>/api/notifications/{notification_id}/mark-read</code></p>
                            
                            <h5>Response</h5>
                            <div class="code-block">
{
  "<span class="json-key">success</span>": <span class="json-value">true</span>,
  "<span class="json-key">message</span>": "<span class="json-value">Notification marked as read</span>"
}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Examples Section -->
                <div id="examples" class="section-card">
                    <div class="section-header">
                        <h2><i class="fas fa-code me-2"></i>Examples</h2>
                    </div>
                    <div class="section-body">
                        <h4>Create Task Example (cURL)</h4>
                        <div class="code-block">
curl -X POST http://localhost:8000/api/tasks \
  -H "Authorization: Bearer <span class="json-key">YOUR_JWT_TOKEN</span>" \
  -H "Content-Type: application/json" \
  -d '{
    "<span class="json-key">title</span>": "<span class="json-value">Complete API Documentation</span>",
    "<span class="json-key">description</span>": "<span class="json-value">Create comprehensive API documentation for Todo project</span>",
    "<span class="json-key">due_date</span>": "<span class="json-value">2023-12-31</span>",
    "<span class="json-key">priority</span>": "<span class="json-value">high</span>"
  }'
                        </div>
                        
                        <h4 class="mt-4">Mark Notification as Read (cURL)</h4>
                        <div class="code-block">
curl -X POST http://localhost:8000/api/notifications/1/mark-read \
  -H "Authorization: Bearer <span class="json-key">YOUR_JWT_TOKEN</span>"
                        </div>
                    </div>
                </div>

                <footer class="text-center py-4 text-muted">
                    <p>Laravel Todo API Documentation &copy; 2023</p>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 20,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Highlight active section in sidebar
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('.section-card');
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>
