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
                    "headline": ["Oxygen", "sans-serif"],
                    "body": ["Inter", "sans-serif"],
                    "label": ["Inter", "sans-serif"]
                },
                borderRadius: { "DEFAULT": "0.5rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
            },
        }
    }
</script>
<style>
    /* =======================================================
       PRO FIX: Force Pearl Theme Container to be Full Width 
       for Academy Category pages
       ======================================================= */
    body.tax-academy_category .site-content,
    body.tax-academy_category .site-content > .container,
    body.post-type-archive-academy .site-content,
    body.post-type-archive-academy .site-content > .container {
        width: 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    /* Ensure WP pagination plays nicely with Tailwind */
    .academy-pagination .page-numbers { display: flex; align-items: center; justify-content: center; width: 2.5rem; height: 2.5rem; border-radius: 9999px; background-color: #f1f3ff; color: #141b2b; font-weight: bold; transition: all 0.3s; text-decoration: none; }
    .academy-pagination .page-numbers:hover { background-color: #e1e8fd; }
    .academy-pagination .page-numbers.current { background-color: #059669; color: #ffffff; }
    /* Reset margins to prevent conflict with Pearl Theme */
    .stm-academy-taxonomy h1, .stm-academy-taxonomy h2, .stm-academy-taxonomy h3 { margin: 0; padding: 0; }
    .stm-academy-taxonomy a { text-decoration: none !important; }
</style>

<div class="stm-academy-taxonomy text-on-surface bg-[#f9f9ff] w-full">
    <main class="pt-12 pb-16 px-8 max-w-[1140px] w-full mx-auto">
        
        <header class="mb-20 text-center">
            <div class="flex flex-col items-center justify-center gap-6">
                <div class="max-w-4xl w-full">
                    <nav class="flex items-center justify-center gap-2 text-label text-xs uppercase tracking-widest text-outline mb-6">
                        <a class="hover:text-primary" href="<?php echo esc_url(home_url()); ?>">Home</a>
                        <span class="material-symbols-outlined text-[10px]">chevron_right</span>
                        <a class="hover:text-primary" href="<?php echo esc_url(get_post_type_archive_link('academy')); ?>">Academy</a>
                        <span class="material-symbols-outlined text-[10px]">chevron_right</span>
                        <span class="text-primary font-bold"><?php single_term_title(); ?></span>
                    </nav>
                    
                    <h1 class="text-5xl md:text-6xl font-headline font-bold tracking-tighter text-on-surface mb-6 leading-tight">
                        <?php single_term_title(); ?>
                    </h1>
                    
                    <p class="text-xl text-on-surface-variant leading-relaxed opacity-80 font-body mx-auto">
                        <?php 
                        $desc = term_description();
                        echo !empty($desc) ? wp_kses_post($desc) : 'Explore our expert articles and guides for ' . single_term_title('', false) . '.';
                        ?>
                    </p>
                </div>
                
                <div class="flex justify-center mt-2">
                    <div class="flex items-center gap-2 bg-surface-container-high px-5 py-2.5 rounded-full shadow-sm">
                        <span class="material-symbols-outlined text-primary" data-icon="menu_book">menu_book</span>
                        <span class="font-label text-sm font-bold text-on-surface"><?php echo esc_html($total_posts); ?> Articles</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-col lg:flex-row gap-12">
            
            <aside class="lg:w-1/4 order-2 lg:order-1">
                <div class="bg-surface-container-low p-8 rounded-xl sticky top-28 space-y-8">
                    <div>
                        <h3 class="font-headline text-lg font-bold mb-6 text-on-surface uppercase tracking-wider">Explore Topics</h3>
                        <ul class="space-y-4">
                            <?php 
                            $academy_terms = get_terms( array(
                                'taxonomy' => 'academy_category',
                                'hide_empty' => false,
                            ));

                            foreach($academy_terms as $term) {
                                $is_active = (get_queried_object_id() == $term->term_id);
                                $term_link = get_term_link($term);
                                
                                if ($is_active) {
                                    echo '<li>
                                        <a class="flex items-center justify-between group p-2 -mx-2 bg-white shadow-sm rounded border-l-4 border-primary" href="'.esc_url($term_link).'">
                                            <span class="text-primary font-bold font-body">'.esc_html($term->name).'</span>
                                            <span class="material-symbols-outlined text-sm text-primary">check_circle</span>
                                        </a>
                                    </li>';
                                } else {
                                    echo '<li>
                                        <a class="flex items-center justify-between group p-2 -mx-2 hover:bg-white rounded transition-all" href="'.esc_url($term_link).'">
                                            <span class="text-on-surface-variant font-body group-hover:text-primary transition-colors">'.esc_html($term->name).'</span>
                                            <span class="material-symbols-outlined text-sm opacity-0 group-hover:opacity-100 transform translate-x-[-10px] group-hover:translate-x-0 transition-all">arrow_forward</span>
                                        </a>
                                    </li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>

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
                </div>
            </aside>

            <section class="lg:w-3/4 order-1 lg:order-2">
                
                <div class="flex flex-wrap items-center justify-between gap-6 mb-12 pb-8 border-b-0">
                    <div class="flex flex-wrap gap-3">
                        <button class="bg-primary text-on-primary px-5 py-2 rounded-full text-sm font-bold font-label border-none">All Levels</button>
                        <button class="bg-surface-container-high text-on-surface hover:bg-surface-container-highest px-5 py-2 rounded-full text-sm font-bold font-label transition-colors border-none">Beginner</button>
                        <button class="bg-surface-container-high text-on-surface hover:bg-surface-container-highest px-5 py-2 rounded-full text-sm font-bold font-label transition-colors border-none">Advanced</button>
                    </div>
                    <div class="flex items-center gap-3 bg-surface-container-low px-4 py-2 rounded text-sm text-outline">
                        <span class="material-symbols-outlined text-lg">filter_list</span>
                        <select class="bg-transparent border-none focus:ring-0 text-on-surface font-label font-bold cursor-pointer p-0 outline-none">
                            <option>Latest Published</option>
                            <option>Most Popular</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php 
                    if ( have_posts() ) : 
                        $post_count = 0;
                        while ( have_posts() ) : the_post(); 
                            $post_count++;
                            $img_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://www.modulus365.com/wp-content/uploads/2025/03/Platform-Capability-2.jpg';
                            
                            $word_count = str_word_count( strip_tags( get_the_content() ) );
                            $reading_time = ceil($word_count / 200);
                            if ($reading_time < 1) $reading_time = 1;

                            if ($post_count === 1) : 
                    ?>
                            <div class="md:col-span-2 group flex flex-col md:flex-row bg-surface-container-lowest rounded-xl overflow-hidden shadow-xl shadow-emerald-900/5 hover:shadow-emerald-900/10 transition-shadow">
                                <div class="md:w-1/2 h-64 md:h-auto overflow-hidden">
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="<?php the_title_attribute(); ?>" src="<?php echo esc_url($img_url); ?>"/>
                                    </a>
                                </div>
                                <div class="md:w-1/2 p-10 flex flex-col justify-center">
                                    <div class="flex gap-2 mb-4">
                                        <span class="bg-secondary-container text-on-secondary-container px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest">Featured</span>
                                        <span class="text-primary font-bold text-[10px] uppercase tracking-widest">Advanced Strategy</span>
                                    </div>
                                    <h3 class="text-3xl font-headline font-bold mb-4 group-hover:text-primary transition-colors">
                                        <a href="<?php the_permalink(); ?>" class="text-on-surface group-hover:text-primary"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="text-on-surface-variant font-body mb-8 line-clamp-3">
                                        <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                                    </p>
                                    <a class="flex items-center gap-2 text-primary font-bold uppercase font-label text-xs tracking-widest group/link" href="<?php the_permalink(); ?>">
                                        Read Full Article
                                        <span class="material-symbols-outlined text-sm group-hover/link:translate-x-1 transition-transform">arrow_right_alt</span>
                                    </a>
                                </div>
                            </div>
                    <?php else : ?>
                            <div class="group bg-surface-container-lowest rounded-xl overflow-hidden shadow-xl shadow-emerald-900/5 flex flex-col h-full">
                                <div class="h-48 overflow-hidden">
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="<?php the_title_attribute(); ?>" src="<?php echo esc_url($img_url); ?>"/>
                                    </a>
                                </div>
                                <div class="p-8 flex flex-col flex-1">
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="text-primary font-bold text-[10px] uppercase tracking-widest">Guide</span>
                                        <span class="text-outline text-xs font-label"><?php echo $reading_time; ?> min read</span>
                                    </div>
                                    <h3 class="text-xl font-headline font-bold mb-3 group-hover:text-primary transition-colors leading-snug">
                                        <a href="<?php the_permalink(); ?>" class="text-on-surface group-hover:text-primary"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="text-on-surface-variant font-body text-sm mb-6 line-clamp-2 flex-1">
                                        <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
                                    </p>
                                    <div class="mt-auto">
                                        <a class="inline-flex items-center gap-2 text-primary font-bold uppercase font-label text-[10px] tracking-widest border-b-2 border-transparent hover:border-primary transition-all" href="<?php the_permalink(); ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                    <?php endif; ?>
                    <?php endwhile; else : ?>
                        <div class="md:col-span-2 text-center py-12">
                            <p class="text-on-surface-variant text-lg">No articles have been published in this section yet.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mt-16 flex justify-center items-center gap-4 academy-pagination">
                    <?php 
                    echo paginate_links( array(
                        'prev_text' => '<span class="material-symbols-outlined">chevron_left</span>',
                        'next_text' => '<span class="material-symbols-outlined">chevron_right</span>',
                        'type'      => 'plain',
                    ) ); 
                    ?>
                </div>

            </section>
        </div>
    </main>
</div>

<div class="site-content"><div class="container no_vc_container">

<?php get_footer(); ?>
