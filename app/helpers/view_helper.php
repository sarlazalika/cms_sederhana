<?php
require_once dirname(__DIR__) . '/config/session.php';

function renderSidebar() {
    $username = getAdminUsername();
    ?>
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3>CMS Admin</h3>
            <p>Welcome, <?php echo htmlspecialchars($username); ?></p>
        </div>

        <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="?controller=dashboard" class="nav-link">
                        <i>📊</i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?controller=artikel" class="nav-link active">
                        <i>📝</i> Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?controller=login&action=logout" class="nav-link">
                        <i>🚪</i> Logout
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <?php
}
?> 