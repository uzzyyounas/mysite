<button class="theme-toggle" id="themeToggle" aria-label="Toggle theme">
    <i class="fas fa-sun theme-icon theme-icon-sun"></i>
    <i class="fas fa-moon theme-icon theme-icon-moon"></i>
</button>

<style>
    .theme-toggle {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: 50%;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all var(--trans);
        margin-left: 12px;
    }

    .theme-toggle:hover {
        transform: rotate(15deg);
        border-color: var(--accent);
    }

    .theme-icon {
        font-size: 1.2rem;
        transition: all var(--trans);
    }

    .theme-icon-sun {
        color: #f39c12;
        display: none;
    }

    .theme-icon-moon {
        color: var(--text-muted);
        display: block;
    }

    [data-theme="dark"] .theme-icon-sun {
        display: block;
    }

    [data-theme="dark"] .theme-icon-moon {
        display: none;
    }

    [data-theme="light"] .theme-icon-sun {
        display: none;
    }

    [data-theme="light"] .theme-icon-moon {
        display: block;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;

        // Get saved theme or default to dark
        const savedTheme = localStorage.getItem('theme') || 'dark';
        html.setAttribute('data-theme', savedTheme);

        themeToggle.addEventListener('click', () => {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);

            // Dispatch event for other components if needed
            window.dispatchEvent(new CustomEvent('themeChange', { detail: { theme: newTheme } }));
        });
    });
</script>
