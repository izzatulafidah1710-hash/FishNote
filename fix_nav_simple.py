files = [
    'resources/views/landing.blade.php',
    'resources/views/promosi.blade.php',
    'resources/views/promosi/show.blade.php',
    'resources/views/artikel/show.blade.php',
    'resources/views/artikel/index.blade.php',
    'resources/views/about.blade.php',
]

OLD_CSS = """.liquid-nav-link {
            padding: 0.55rem 1.25rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
            transition: all 0.2s ease-in-out;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .liquid-nav-link:hover {
            color: #2563eb;
            background-color: #f1f5f9;
        }

        .liquid-nav-active {
            color: #1d4ed8 !important;
            font-weight: 700 !important;
            background-color: #e0f2fe !important;
        }"""

NEW_CSS = """.liquid-nav-link {
            padding: 0.45rem 0.9rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #64748b;
            transition: color 0.15s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .liquid-nav-link:hover {
            color: #2563eb;
        }

        .liquid-nav-active {
            color: #1d4ed8 !important;
            font-weight: 700 !important;
            border-bottom: 2px solid #2563eb;
        }"""

for filepath in files:
    try:
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()

        if OLD_CSS in content:
            content = content.replace(OLD_CSS, NEW_CSS)
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(content)
            print(f'[OK] Fixed: {filepath}')
        else:
            print(f'[??] CSS not found in: {filepath}')
    except Exception as e:
        print(f'[!!] Error: {filepath}: {e}')

print('Selesai.')
