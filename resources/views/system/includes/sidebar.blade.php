    {{-- Dashboard --}}
    <x-system.sidebar-list :input="[
        'title' => 'Dashboard',
        'route' => 'home',
        'icon' => 'fas fa-home',
        'permission' => checkPermission('home', 'GET'),
    ]" />

    {{-- Menu Management --}}
    <x-system.sidebar-list :input="[
        'title' => 'Menu Management',
        'route' => 'menus',
        'icon' => 'fas fa-list',
        'permission' => checkPermission('menus', 'GET'),
    ]" />

    {{-- Email Management --}}
    <x-system.sidebar-list :input="[
        'title' => 'Email Templates ',
        'route' => 'email-templates',
        'icon' => 'fas fa-envelope-open-text',
        'permission' => checkPermission('menus', 'GET'),
    ]" />

    {{-- Vacancy Management --}}
    <x-system.sidebar-list :input="[
        'title' => 'Vacancy Management',
        'icon' => 'fas fa-briefcase',
        'hasSubmenu' => true,
        'subMenus' => [
            [
                'title' => 'Vacancies',
                'route' => 'vacancies',
                'icon' => 'fas fa-list',
                'permission' => checkPermission('activity-logs', 'GET'),
            ],
            [
                'title' => 'Applicants',
                'route' => 'applicants',
                'icon' => 'fas fa-user-tie',
                'permission' => checkPermission('applicants', 'GET'),
            ],
        ],
    ]" />


    {{-- Enquiy Management --}}
    <x-system.sidebar-list :input="[
        'title' => 'Enquiy Management',
        'route' => 'enquiries',
        'icon' => 'fas fa-comment',
        'permission' => checkPermission('enquiries', 'GET'),
    ]" />

    {{-- System Config --}}
    <x-system.sidebar-list :input="[
        'title' => 'System Config',
        'route' => 'configs',
        'icon' => 'fas fa-wrench',
        'permission' => checkPermission('configs', 'GET'),
    ]" />

    {{-- Basic Setup --}}
    <x-system.sidebar-list :input="[
        'title' => 'Basic Setup',
        'icon' => 'fas fa-cog parent-icon',
        'hasSubmenu' => true,
        'subMenus' => [
            //Content Types
            [
                'title' => 'Content Types',
                'route' => 'content-types',
                'icon' => 'fas fa-icons',
                'permission' => checkPermission('content-types', 'GET'),
            ],
    
            //Services
            [
                'title' => 'Services',
                'route' => 'services',
                'icon' => 'fas fa-hand-holding-heart',
                'permission' => checkPermission('services', 'GET'),
            ],
    
            //Partners
            [
                'title' => 'Partners',
                'route' => 'partners',
                'icon' => 'fas fa-handshake',
                'permission' => checkPermission('partners', 'GET'),
            ],
    
            //Clients
            [
                'title' => 'Clients',
                'route' => 'clients',
                'icon' => 'fas fa-users',
                'permission' => checkPermission('clients', 'GET'),
            ],
    
            //Sliders
            [
                'title' => 'Sliders',
                'route' => 'sliders',
                'icon' => 'fas fa-images',
                'permission' => checkPermission('sliders', 'GET'),
            ],
    
            //Testomonials
            [
                'title' => 'Testimonials',
                'route' => 'testimonials',
                'icon' => 'fas fa-comment-dots',
                'permission' => checkPermission('testimonials', 'GET'),
            ],
    
            //Process
            [
                'title' => 'Process',
                'route' => 'processes',
                'icon' => 'fas fa-list',
                'permission' => checkPermission('processes', 'GET'),
            ],
    
            //Popups
            // [
            //     'title' => 'Popups',
            //     'route' => 'popups',
            //     'icon' => 'far fa-flag',
            //     'permission' => checkPermission('popups', 'GET'),
            // ],
        ],
    ]" />


    {{-- User Management --}}
    <x-system.sidebar-list :input="[
        'title' => 'User Management',
        'icon' => 'fas fa-user-clock',
        'hasSubmenu' => true,
        'subMenus' => [
            [
                'title' => 'Users',
                'route' => 'users',
                'icon' => 'fas fa-users',
                'permission' => checkPermission('users', 'GET'),
            ],
            [
                'title' => 'Roles',
                'route' => 'roles',
                'icon' => 'fas fa-user-tie',
                'permission' => checkPermission('roles', 'GET'),
            ],
            [
                'title' => 'Modules',
                'route' => 'modules',
                'icon' => 'fas fa-list-ol',
                'permission' => checkPermission('modules', 'GET'),
            ],
        ],
    ]" />


    {{-- Log Management --}}
    <x-system.sidebar-list :input="[
        'title' => 'Logs Management',
        'icon' => 'fas fa-history',
        'hasSubmenu' => true,
        'subMenus' => [
            [
                'title' => 'Activity Log',
                'route' => 'activity-logs',
                'icon' => 'fas fa-chart-line',
                'permission' => checkPermission('activity-logs', 'GET'),
            ],
            [
                'title' => 'Login Logs',
                'route' => 'login-logs',
                'icon' => 'fas fa-clipboard-list',
                'permission' => checkPermission('login-logs', 'GET'),
            ],
        ],
    ]" />
