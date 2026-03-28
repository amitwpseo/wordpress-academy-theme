<?php 
get_header(); 

// Get current taxonomy term data
$current_term = get_queried_object();
global $wp_query;
$total_posts = $wp_query->found_posts;
?>

</div></div>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&family=Inter:wght@400;600;700&family=Manrope:wght@400;700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "secondary": "#795900", "on-primary-fixed": "#002114", "surface-container": "#e9edff",
                    "primary-fixed-dim": "#68dba9", "on-error": "#ffffff", "tertiary": "#bb0112",
                    "surface-dim": "#d3daef", "surface-bright": "#f9f9ff", "on-tertiary-container": "#fffbff",
                    "inverse-primary": "#68dba9", "surface-container-lowest": "#ffffff", "secondary-fixed-dim": "#f9bd22",
                    "surface-container-low": "#f1f3ff", "on-secondary-container": "#6f5100", "surface-container-high": "#e1e8fd",
                    "on-secondary-fixed-variant": "#5c4300", "surface-tint": "#006c4a", "secondary-fixed": "#ffdf9f",
                    "primary": "#059669", /* Modulus Green */ "on-primary": "#ffffff", "background": "#f9f9ff",
                    "primary-container": "#00855d", "on-surface-variant": "#3d4a42", "on-secondary": "#ffffff",
                    "outline": "#6d7a72", "surface-container-highest": "#dce2f7", "on-surface": "#141b2b",
                    "error-container": "#ffdad6", "on-primary-fixed-variant": "#005137", "error": "#ba1a1a",
                    "on-secondary-fixed": "#261a00", "tertiary-fixed-dim": "#ffb4ab", "inverse-on-surface": "#edf0ff",
                    "on-primary-container": "#f5fff7", "on-tertiary": "#ffffff", "secondary-container": "#ffc329",
                    "inverse-surface": "#293040", "tertiary-container": "#e02928", "tertiary-fixed": "#ffdad6",
                    "on-tertiary-fixed": "#410002", "on-error-container": "#93000a", "surface-variant": "#dce2f7",
                    "surface": "#f9f9ff", "on-tertiary-fixed-variant": "#93000b", "on-background": "#141b2b",
                    "primary-fixed": "#85f8c4", "outline-variant": "#bccac0"
                },
                fontFamily: {
                    "headline": ["Oxygen", "Manrope", "sans-serif"],
                    "body": ["Inter", "sans-serif"],
                    "label": ["Inter", "sans-serif"]
                },
                borderRadius: { "DEFAULT": "0.5rem", "lg": "0.75rem", "xl": "1rem", "full": "9999px" },
            },
        },
    }
</script>

<style>
    body.single-academy .site-content,
    body.single-academy .site-content > .container {
        width: 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    html { scroll-behavior: smooth; }
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    .no-scrollbar::-webkit-scrollbar { display: none; }
    @media (max-width: 1023px) { .academy-sidebar { display: none !important; } }
    
    .prose-academic h2 { font-family: 'Oxygen', sans-serif; font-weight: 700; font-size: 2rem; color: #141b2b; margin-top: 3rem; margin-bottom: 1.5rem; letter-spacing: -0.02em; scroll-margin-top: 100px; }
    .prose-academic h3 { font-family: 'Oxygen', sans-serif; font-weight: 700; font-size: 1.5rem; color: #141b2b; margin-top: 2rem; margin-bottom: 1rem; }
    .prose-academic p { font-family: 'Inter', sans-serif; font-size: 1.125rem; line-height: 1.8; color: #3d4a42; margin-bottom: 1.5rem; }
    .prose-academic ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; color: #3d4a42; font-family: 'Inter', sans-serif; font-size: 1.125rem; line-height: 1.8; }
    .prose-academic li { margin-bottom: 0.5rem; }
    .prose-academic a { color: #059669; font-weight: 600; text-decoration: underline; text-decoration-color: rgba(5, 150, 105, 0.3); }
    .prose-academic a:hover { text-decoration-color: #059669; }
    .prose-academic blockquote { margin: 3rem 0; padding: 2rem 2.5rem; background-color: #002114; color: #fffbff; border-radius: 1rem; font-family: 'Oxygen', sans-serif; font-size: 1.5rem; line-height: 1.4; font-weight: 700; }
    .prose-academic blockquote p { color: inherit; font-family: inherit; font-size: inherit; margin-bottom: 0; }
    .prose-academic img { border-radius: 1rem; margin: 2rem 0; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); width: 100%; height: auto; }
</style>

<?php while ( have_posts() ) : the_post(); 
    
    $content = get_the_content();
    $toc_items = array();
    
    if ( preg_match_all( '/<h2.*?>(.*?)<\/h2>/s', $content, $matches ) ) {
        foreach ( $matches[1] as $index => $heading_text ) {
            $clean_text = strip_tags( $heading_text );
            $slug = sanitize_title( $clean_text );
            $toc_items[] = array('text' => $clean_text, 'id' => $slug);
            $original_h2 = $matches[0][$index];
            $new_h2 = sprintf( '<h2 id="%s">%s</h2>', esc_attr( $slug ), $heading_text );
            $content = str_replace( $original_h2, $new_h2, $content );
        }
    }
    
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );

    $word_count = str_word_count( strip_tags( $content ) );
    $reading_time = ceil($word_count / 200);
    if ($reading_time < 1) $reading_time = 1;

    $terms = get_the_terms( get_the_ID(), 'academy_category' );
    $primary_term = !empty($terms) && !is_wp_error($terms) ? $terms[0] : null;
    
    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author_meta('display_name');
    $author_avatar = get_avatar_url($author_id);

    // Prepare Sharing Data
    $share_url = urlencode(get_permalink());
    $share_title = urlencode(get_the_title());
?>

<div class="bg-surface font-body text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed-variant" style="width: 100%;">

    <main class="pt-16 pb-24 max-w-[1140px] w-full px-8 mx-auto">
        
        <header class="mb-20 text-center">
            <nav class="flex items-center justify-center gap-2 mb-6 text-sm font-label font-bold uppercase tracking-widest text-primary">
                <a class="hover:underline" href="<?php echo esc_url(get_post_type_archive_link('academy')); ?>">Academy</a>
                <span class="material-symbols-outlined text-xs">chevron_right</span>
                <?php if ($primary_term) : ?>
                    <a class="hover:underline" href="<?php echo esc_url(get_term_link($primary_term)); ?>"><?php echo esc_html($primary_term->name); ?></a>
                <?php endif; ?>
            </nav>
            
            <h1 class="text-5xl md:text-7xl font-headline font-bold text-on-surface leading-[1.1] mb-10 tracking-tight max-w-5xl mx-auto">
                <?php the_title(); ?>
            </h1>
            
            <?php if (has_excerpt()) : ?>
                <p class="text-xl text-on-surface-variant leading-relaxed opacity-80 mb-10 max-w-3xl mx-auto">
                    <?php echo get_the_excerpt(); ?>
                </p>
            <?php endif; ?>

            <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-12">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center overflow-hidden shadow-sm">
                        <?php if($author_avatar): ?>
                            <img class="w-full h-full object-cover" src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>"/>
                        <?php else: ?>
                            <span class="font-bold text-primary"><?php echo substr($author_name, 0, 1); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="text-left">
                        <p class="font-bold text-on-surface leading-none mb-1"><?php echo esc_html($author_name); ?></p>
                        <p class="text-xs text-outline uppercase tracking-wider">Modulus Expert</p>
                    </div>
                </div>
                <div class="hidden md:block h-8 w-px bg-outline-variant/30"></div>
                <div class="text-sm text-outline flex items-center gap-4">
                    <p class="font-bold uppercase tracking-wider"><?php echo $reading_time; ?> Min Read</p>
                    <span class="w-1.5 h-1.5 rounded-full bg-primary/30"></span>
                    <p>Published <?php echo get_the_date('M j, Y'); ?></p>
                </div>

                <div class="flex items-center gap-2">
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>" target="_blank" class="w-9 h-9 rounded-full bg-white border border-surface-container-high flex items-center justify-center text-outline hover:bg-[#0077b5] hover:text-white transition-all shadow-sm">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" class="w-9 h-9 rounded-full bg-white border border-surface-container-high flex items-center justify-center text-outline hover:bg-black hover:text-white transition-all shadow-sm">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" class="w-9 h-9 rounded-full bg-white border border-surface-container-high flex items-center justify-center text-outline hover:bg-[#1877f2] hover:text-white transition-all shadow-sm">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!');" class="w-9 h-9 rounded-full bg-white border border-surface-container-high flex items-center justify-center text-outline hover:bg-primary hover:text-on-primary transition-all shadow-sm cursor-pointer">
                        <span class="material-symbols-outlined text-lg">link</span>
                    </button>
                    <button onclick="window.print();" class="w-9 h-9 rounded-full bg-white border border-surface-container-high flex items-center justify-center text-outline hover:bg-primary hover:text-on-primary transition-all shadow-sm cursor-pointer">
                        <span class="material-symbols-outlined text-lg">bookmark</span>
                    </button>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            
            <aside class="academy-sidebar lg:col-span-3 sticky top-32 self-start space-y-8">
                
                <?php if ( ! empty( $toc_items ) ) : ?>
                <div class="p-6 rounded-xl bg-surface-container-low">
                    <h3 class="font-label font-bold uppercase tracking-widest text-xs text-outline mb-6">Contents</h3>
                    <ul class="space-y-4">
                        <?php foreach ( $toc_items as $index => $item ) : 
                            // UPDATED: Added font-normal to inactive, and no-underline to both.
                            $link_class = ($index === 0) 
                                ? 'text-primary font-bold border-l-4 border-primary pl-4 block transition-all no-underline' 
                                : 'text-on-surface-variant font-normal hover:text-primary border-l-4 border-transparent pl-4 block transition-all no-underline';
                        ?>
                            <li><a class="<?php echo esc_attr($link_class); ?>" href="#<?php echo esc_attr($item['id']); ?>"><?php echo esc_html($item['text']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="mt-8 pt-8 border-t border-outline-variant/20">
                        <a class="flex items-center gap-2 text-primary font-bold text-sm group" href="<?php echo esc_url(get_post_type_archive_link('academy')); ?>">
                            <span class="material-symbols-outlined transition-transform group-hover:-translate-x-1">arrow_back</span> Back to Academy
                        </a>
                    </div>
                </div>
                <?php endif; ?>

                <div class="bg-primary text-on-primary p-8 rounded-2xl overflow-hidden relative shadow-xl">
                    <div class="relative z-10">
                        <h3 class="font-headline font-bold text-2xl mb-4 leading-tight">Need a custom layout audit?</h3>
                        <p class="text-on-primary/80 text-sm mb-6">Our experts use data-driven simulation to find the hidden capacity in your facility.</p>
                        <a href="/contact/" class="block text-center w-full bg-secondary-container text-on-secondary-container font-bold py-3 rounded-lg hover:bg-white transition-all scale-95 active:scale-90">Talk to an Expert</a>
                    </div>
                    <div class="absolute -bottom-10 -right-10 opacity-20 transform rotate-12">
                        <span class="material-symbols-outlined text-9xl">precision_manufacturing</span>
                    </div>
                </div>
                
                <div class="p-8 rounded-2xl bg-white shadow-sm border border-surface-container-high">
                    <h4 class="font-bold mb-4">Ops Weekly</h4>
                    <p class="text-xs text-outline mb-6 leading-relaxed">Get the latest scholarly research in fulfilment logistics delivered to your inbox.</p>
                    <input class="w-full bg-surface-container-low border-none rounded-lg text-sm mb-3 focus:ring-2 focus:ring-primary" placeholder="Email address" type="email"/>
                    <button class="w-full bg-on-surface text-white font-bold py-2 rounded-lg text-sm border-none cursor-pointer">Subscribe</button>
                </div>
            </aside>

            <article class="lg:col-span-9 prose-academic" id="academy-content">
                <?php echo $content; ?>
                
                <hr class="my-16 border-outline-variant/20"/>
                
                <div class="flex flex-col md:flex-row items-center justify-between gap-8 py-8 px-10 bg-surface-container-lowest rounded-2xl shadow-sm border border-surface-container-high">
                    <div>
                        <h4 class="font-bold text-lg m-0">Helpful article?</h4>
                        <p class="text-sm text-outline m-0">Share this with your operations team</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>" target="_blank" title="LinkedIn" class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center hover:scale-110 hover:bg-surface-container-highest transition-all shadow-md no-underline">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" title="X (Twitter)" class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center hover:scale-110 hover:bg-surface-container-highest transition-all shadow-md no-underline">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" title="Facebook" class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center hover:scale-110 hover:bg-surface-container-highest transition-all shadow-md no-underline">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="mailto:?subject=<?php echo $share_title; ?>&body=Thought you might find this interesting: <?php echo $share_url; ?>" title="Email" class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center hover:scale-110 hover:bg-surface-container-highest transition-all shadow-md no-underline">
                            <i class="fa fa-envelope">    </i>
                        </a>
                        <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!');" title="Copy Link" class="w-10 h-10 rounded-full bg-surface-container-high text-on-surface flex items-center justify-center hover:scale-110 hover:bg-surface-container-highest transition-all shadow-md border-none cursor-pointer">
                            <span class="material-symbols-outlined text-lg">link</span>
                        </button>
                    </div>
                </div>
            </article>
        </div>
    </main>

    <section class="bg-surface-container-low py-24 w-full">
        <div class="max-w-[1140px] w-full mx-auto px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-headline font-bold mb-4">Articles from same category</h2>
                    <p class="text-outline">Deepen your knowledge with these related resources</p>
                </div>
                <?php if ($primary_term) : ?>
                    <a class="font-bold text-primary hover:underline flex items-center gap-2" href="<?php echo esc_url(get_term_link($primary_term)); ?>">
                        View All Resources <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                <?php endif; ?>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php 
                $related_args = array('post_type' => 'academy', 'posts_per_page' => 3, 'post__not_in' => array(get_the_ID()));
                if ($primary_term) {
                    $related_args['tax_query'] = array(array('taxonomy' => 'academy_category', 'field' => 'term_id', 'terms' => $primary_term->term_id));
                }
                $related_query = new WP_Query($related_args);
                if ($related_query->have_posts()) :
                    while ($related_query->have_posts()) : $related_query->the_post(); 
                        $rel_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium_large') : 'https://www.modulus365.com/wp-content/uploads/2025/03/Platform-Capability-2.jpg';
                ?>
                    <a href="<?php the_permalink(); ?>" class="group cursor-pointer block no-underline">
                        <div class="aspect-video rounded-xl bg-surface-container-highest mb-6 overflow-hidden relative shadow-sm">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="<?php echo esc_url($rel_img); ?>" alt="<?php the_title_attribute(); ?>"/>
                            <div class="absolute top-4 left-4">
                                <span class="bg-surface-container-lowest text-primary text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full shadow-sm">Read Next</span>
                            </div>
                        </div>
                        <h4 class="text-xl font-headline font-bold text-on-surface group-hover:text-primary transition-colors m-0"><?php the_title(); ?></h4>
                        <p class="text-sm text-outline mt-3 line-clamp-2 italic m-0"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                    </a>
                <?php endwhile; wp_reset_postdata(); else : ?>
                    <p class="text-on-surface-variant">No related articles found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php endwhile; ?>

<div class="site-content"><div class="container no_vc_container">

    
<?php get_footer(); ?>
