import os, re

files = [
    'resources/views/promosi.blade.php',
    'resources/views/promosi/show.blade.php',
    'resources/views/landing.blade.php',
    'resources/views/artikel/show.blade.php',
    'resources/views/artikel/index.blade.php',
    'resources/views/about.blade.php'
]

css_pattern = re.compile(r'\.liquid-nav-link \{[\s\S]*?\.liquid-nav-link:active \{[\s\S]*?\}', re.MULTILINE)
new_css = r'''.liquid-nav-link {
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
        }'''

for f in files:
    if not os.path.exists(f):
        print(f"File not found: {f}")
        continue
        
    with open(f, 'r', encoding='utf-8') as file:
        content = file.read()
    
    # replace css
    content = css_pattern.sub(new_css, content)
    
    # replace menu order (tentang kami followed by artikel -> artikel followed by tentang kami)
    # The regex matches "Tentang Kami" link (group 1), whitespace (group 2), "Artikel" link (group 3)
    # Desktop and Mobile:
    
    # Let's match based on route
    # We find `<a ...route('about')...>Tentang Kami</a>` and `<a ...route('artikel.index')...>Artikel</a>`
    pattern_about = r'(<a href="\{\{\s*route\(\'about\'\)\s*\}\}"[^>]*>.*?Tentang Kami.*?</a>)'
    pattern_artikel = r'(<a href="\{\{\s*route\(\'artikel\.index\'\)\s*\}\}"[^>]*>.*?Artikel.*?</a>)'
    
    # We want to match: about_link + spaces + artikel_link
    regex = pattern_about + r'(\s*)' + pattern_artikel
    
    content = re.sub(regex, r'\3\2\1', content)
    
    with open(f, 'w', encoding='utf-8') as file:
        file.write(content)

print('Replacement complete.')
