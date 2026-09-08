import re

files = [
    'resources/views/landing.blade.php',
    'resources/views/promosi.blade.php',
    'resources/views/promosi/show.blade.php',
    'resources/views/artikel/show.blade.php',
    'resources/views/artikel/index.blade.php',
    'resources/views/about.blade.php',
]

def revert_body_bg(content):
    # Kembalikan body tag ke semula
    content = content.replace(
        '<body class="text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen" style="background: linear-gradient(to bottom, #1b75bb 0%, #4da3db 25%, #a8d4f0 50%, #e8f4fd 70%, #ffffff 100%);">',
        '<body class="bg-gradient-to-b from-sky-100/90 via-blue-50/50 to-slate-50 text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen">'
    )
    return content

def revert_glass_nav(content):
    content = content.replace(
        'background: rgba(255, 255, 255, 0.90);',
        'background: rgba(255, 255, 255, 0.82);'
    )
    return content

def revert_sub_page_header(content):
    content = content.replace(
        'class="bg-white/70 backdrop-blur-md border-b border-white/40 py-3.5"',
        'class="bg-white/80 backdrop-blur-md border-b border-slate-200/80 py-3.5"'
    )
    return content

def revert_landing_hero(content):
    # Hero section
    content = content.replace(
        'class="relative pt-28 lg:pt-36 pb-20 overflow-hidden"',
        'class="relative pt-28 lg:pt-36 pb-20 overflow-hidden bg-gradient-to-b from-sky-100/80 via-blue-50/60 to-transparent text-slate-800"'
    )
    # Ambient glows
    content = content.replace(
        'class="absolute top-10 left-1/4 w-[30rem] h-[30rem] bg-white/15 rounded-full blur-3xl pointer-events-none"',
        'class="absolute top-10 left-1/4 w-[30rem] h-[30rem] bg-sky-300/40 rounded-full blur-3xl pointer-events-none"'
    )
    content = content.replace(
        'class="absolute bottom-10 right-10 w-[28rem] h-[28rem] bg-white/20 rounded-full blur-3xl pointer-events-none"',
        'class="absolute bottom-10 right-10 w-[28rem] h-[28rem] bg-blue-200/50 rounded-full blur-3xl pointer-events-none"'
    )
    # Hero headline
    content = content.replace(
        'class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight tracking-tight drop-shadow-md"',
        'class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight tracking-tight"'
    )
    # Highlight span
    content = content.replace(
        'class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-white to-blue-100"',
        'class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 via-blue-600 to-indigo-600"'
    )
    # Hero subtitle
    content = content.replace(
        'class="text-blue-100 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal"',
        'class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal"'
    )
    # CTA Button "Mulai Sekarang"
    content = content.replace(
        'class="w-full sm:w-auto px-8 py-4 bg-white hover:bg-blue-50 text-brand-700 font-bold rounded-2xl shadow-xl shadow-blue-900/20 hover:-translate-y-0.5 transition duration-200 text-center flex items-center justify-center gap-2 text-base"',
        'class="w-full sm:w-auto px-8 py-4 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-2xl shadow-xl shadow-brand-600/30 hover:-translate-y-0.5 transition duration-200 text-center flex items-center justify-center gap-2 text-base"'
    )
    # CTA Button "Jelajahi Promosi"
    content = content.replace(
        'class="w-full sm:w-auto px-8 py-4 bg-white/15 hover:bg-white/25 border border-white/40 text-white font-bold rounded-2xl shadow-sm transition duration-200 text-center text-base"',
        'class="w-full sm:w-auto px-8 py-4 bg-white hover:bg-slate-100 border border-slate-200 text-slate-800 font-bold rounded-2xl shadow-sm transition duration-200 text-center text-base"'
    )
    # Blob SVG
    content = content.replace(
        'class="w-[340px] h-[340px] sm:w-[440px] sm:h-[440px] text-white/20 fill-current filter drop-shadow-lg"',
        'class="w-[340px] h-[340px] sm:w-[440px] sm:h-[440px] text-sky-200/80 fill-current filter drop-shadow-lg"'
    )
    # Search section
    content = content.replace(
        'class="py-16 bg-transparent"',
        'class="py-16 bg-gradient-to-b from-transparent via-blue-50/40 to-transparent"'
    )
    return content

for filepath in files:
    try:
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()

        original = content
        content = revert_body_bg(content)
        content = revert_glass_nav(content)
        content = revert_sub_page_header(content)

        if 'landing.blade.php' in filepath:
            content = revert_landing_hero(content)

        if content != original:
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(content)
            print(f'[OK] Reverted: {filepath}')
        else:
            print(f'[--] No change: {filepath}')

    except FileNotFoundError:
        print(f'[!!] File not found: {filepath}')
    except Exception as e:
        print(f'[!!] Error on {filepath}: {e}')

print('\nSelesai! Semua dikembalikan ke tampilan semula.')
