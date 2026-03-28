<?php get_header(); ?>

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
                    "primary": "#059669", /* Adjusted to Modulus Green */ "on-primary": "#ffffff", "background": "#f9f9ff",
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
                borderRadius: {"DEFAULT": "0.5rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
            },
        },
    }
</script>
<style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    /* Reset margins for Modulus Theme compatibility */
    .stm-academy-archive h1, .stm-academy-archive h2, .stm-academy-archive h3, .stm-academy-archive h4 { margin: 0; padding: 0; }
    .stm-academy-archive a { text-decoration: none !important; }
</style>

<div class="stm-academy-archive bg-surface font-body text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
    <main class="pt-10 md:pt-16">
        
        <section class="relative px-8 pt-12 pb-16 md:pt-24 md:pb-24 max-w-5xl mx-auto text-center">
            <div class="z-10 flex flex-col items-center">
                <span class="inline-block bg-secondary-container text-on-secondary-container px-4 py-1 rounded-full font-label text-[10px] uppercase tracking-[0.15em] font-bold mb-6">Master Modern Logistics</span>
                <h1 class="text-5xl md:text-7xl font-headline font-bold text-on-surface leading-[0.95] tracking-tighter mb-8 max-w-3xl">
                    Fulfilment Ops Academy
                </h1>
                <p class="text-xl text-on-surface-variant leading-relaxed max-w-2xl mb-12">
                    The definitive resource for high-growth logistics teams. We curate expert insights into inventory, supply chains, and global distribution workflows.
                </p>

                <form role="search" method="get" class="w-full relative group shadow-2xl shadow-emerald-900/10 rounded-2xl overflow-hidden transition-all duration-300 focus-within:shadow-emerald-900/20 mb-8" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    
                    <input 
                        class="peer w-full bg-surface-container-lowest border-2 border-surface-container-high rounded-2xl py-6 pr-40 pl-8 placeholder-shown:pl-20 text-xl text-on-surface placeholder:text-outline focus:ring-0 focus:border-primary transition-all duration-300 font-body outline-none relative z-0" 
                        placeholder="Search insights, guides, tools..." 
                        type="search" 
                        name="s" 
                        data-swplive="true"
                    />
                    
                    <div class="absolute inset-y-0 left-6 flex items-center pointer-events-none transition-opacity duration-300 opacity-0 peer-placeholder-shown:opacity-100 z-10">
                        <span class="material-symbols-outlined text-primary text-4xl">search</span>
                    </div>

                    <input type="hidden" name="post_type" value="academy" />
                    
                    <div class="absolute inset-y-2 right-2 flex items-center z-20">
                        <button type="submit" class="bg-primary text-on-primary px-8 h-full rounded-xl font-label text-sm uppercase tracking-widest font-bold hover:bg-primary-container transition-colors shadow-lg border-none cursor-pointer">
                            Search
                        </button>
                    </div>
                </form>

                
            </div>
        </section>

        <section class="bg-surface-container-low py-20 px-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <h2 class="text-3xl font-headline font-bold text-on-surface tracking-tight mb-4">Featured Insights</h2>
                        <div class="h-1 w-24 bg-primary rounded-full"></div>
                    </div>
                    <a class="text-primary font-label text-xs uppercase tracking-widest font-bold flex items-center gap-2 hover:gap-4 transition-all" href="#knowledge-domains">
                        View Categories <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
                
                <div class="grid md:grid-cols-12 gap-8">
                    <?php 
                    // Query the 2 most recent Academy Articles
                    $featured_args = array(
                        'post_type'      => 'academy',
                        'posts_per_page' => 2,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                    $featured_query = new WP_Query($featured_args);

                    if ($featured_query->have_posts()) :
                        $post_index = 0;
                        while ($featured_query->have_posts()) : $featured_query->the_post();
                            $post_index++;
                            
                            // Dynamic Data Extraction
                            $img_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : 'https://www.modulus365.com/wp-content/uploads/2023/08/iStock-1397697909-1536x1024.jpg';
                            $title = get_the_title();
                            $link = get_permalink();
                            
                            // Term / Category Name
                            $terms = get_the_terms( get_the_ID(), 'academy_category' );
                            $cat_name = !empty($terms) && !is_wp_error($terms) ? $terms[0]->name : 'Insight';
                            
                            // Author details & Initials
                            $author_name = get_the_author_meta('display_name');
                            $name_parts = explode(' ', $author_name);
                            $author_initials = count($name_parts) > 1 ? substr($name_parts[0], 0, 1) . substr($name_parts[1], 0, 1) : substr($author_name, 0, 1);
                            
                            // Reading Time
                            $word_count = str_word_count( strip_tags( get_the_content() ) );
                            $read_time = ceil($word_count / 200);
                            if ($read_time < 1) $read_time = 1;

                            if ($post_index === 1) :
                                // --- MAIN FEATURED ARTICLE (Large Left Card) ---
                                $excerpt = wp_trim_words(get_the_excerpt(), 25, '...');
                    ?>
                                <a href="<?php echo esc_url($link); ?>" class="md:col-span-8 group cursor-pointer no-underline block">
                                    <div class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-500 h-full flex flex-col">
                                        <div class="aspect-[21/9] overflow-hidden">
                                            <img alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?php echo esc_url($img_url); ?>"/>
                                        </div>
                                        <div class="p-8 flex-1 flex flex-col">
                                            <div class="flex items-center gap-4 mb-4">
                                                <span class="bg-primary-container text-on-primary-container px-3 py-0.5 rounded-full font-label text-[10px] uppercase tracking-wider font-bold">New Release</span>
                                                <span class="text-outline text-xs font-label uppercase tracking-widest"><?php echo $read_time; ?> Min Read</span>
                                            </div>
                                            <h3 class="text-2xl font-headline font-bold mb-3 text-on-surface group-hover:text-primary transition-colors"><?php echo esc_html($title); ?></h3>
                                            <p class="text-on-surface-variant text-base leading-relaxed mb-6 flex-1"><?php echo esc_html($excerpt); ?></p>
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center font-bold text-primary text-xs uppercase"><?php echo esc_html($author_initials); ?></div>
                                                <span class="font-label text-xs font-bold text-slate-700"><?php echo esc_html($author_name); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                    <?php 
                            else :
                                // --- SECONDARY FEATURED ARTICLE (Smaller Right Card) ---
                                $excerpt = wp_trim_words(get_the_excerpt(), 15, '...');
                    ?>
                                <a href="<?php echo esc_url($link); ?>" class="md:col-span-4 group cursor-pointer no-underline block">
                                    <div class="bg-surface-container-lowest h-full rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-500 flex flex-col">
                                        <div class="aspect-square overflow-hidden max-h-64">
                                            <img alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="<?php echo esc_url($img_url); ?>"/>
                                        </div>
                                        <div class="p-8 flex-1 flex flex-col">
                                            <span class="text-outline text-xs font-label uppercase tracking-widest mb-3"><?php echo esc_html($cat_name); ?></span>
                                            <h3 class="text-xl font-headline font-bold mb-3 text-on-surface group-hover:text-primary transition-colors leading-snug"><?php echo esc_html($title); ?></h3>
                                            <p class="text-on-surface-variant text-sm leading-relaxed flex-1"><?php echo esc_html($excerpt); ?></p>
                                            <div class="mt-6 pt-4 border-t border-surface-container-high flex items-center justify-between">
                                                <span class="text-xs font-bold text-outline uppercase tracking-widest"><?php echo $read_time; ?> Min</span>
                                                <span class="material-symbols-outlined text-primary group-hover:translate-x-2 transition-transform">arrow_forward</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                    <?php 
                            endif;
                        endwhile;
                        wp_reset_postdata();
                    else : 
                    ?>
                        <div class="md:col-span-12 text-center py-10">
                            <p class="text-on-surface-variant">No articles have been published to the academy yet.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section id="knowledge-domains" class="py-24 px-8 max-w-7xl mx-auto">
            <div class="mb-16 text-center">
                <h2 class="text-4xl font-headline font-bold text-on-surface tracking-tight mb-4">Knowledge Domains</h2>
                <p class="text-on-surface-variant max-w-xl mx-auto text-lg">Deep dive into specific logistics pillars with curated learning paths.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php 
                $terms = get_terms( array(
                    'taxonomy' => 'academy_category', 
                    'hide_empty' => false,
                ) );

                $icons = ['inventory_2', 'conveyor_belt', 'local_shipping', 'warehouse', 'account_tree', 'precision_manufacturing'];
                $i = 0;

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
                    foreach ( $terms as $term ) : 
                        $icon = $icons[$i % count($icons)];
                        $i++;
                ?>
                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="group p-8 bg-surface-container-low rounded-xl hover:bg-surface-container-highest transition-all duration-300 flex flex-col h-full">
                        <div class="w-14 h-14 bg-primary rounded-xl flex items-center justify-center text-on-primary mb-6 shadow-lg shadow-emerald-900/10 transform transition-transform group-hover:-translate-y-1">
                            <span class="material-symbols-outlined text-3xl" data-icon="<?php echo esc_attr($icon); ?>"><?php echo esc_html($icon); ?></span>
                        </div>
                        <h4 class="text-xl font-headline font-bold mb-3 group-hover:text-primary transition-colors"><?php echo esc_html( $term->name ); ?></h4>
                        
                        <p class="text-on-surface-variant text-sm leading-relaxed mb-6 flex-1">
                            <?php 
                                echo !empty($term->description) ? esc_html($term->description) : 'Explore expert articles, playbooks, and strategic resources for ' . esc_html(strtolower($term->name)) . '.'; 
                            ?>
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-surface-container-high flex items-center justify-between text-primary font-label text-xs uppercase tracking-widest font-bold">
                            <span>View Articles</span>
                            <span class="material-symbols-outlined group-hover:translate-x-2 transition-transform">arrow_forward</span>
                        </div>
                    </a>
                <?php 
                    endforeach; 
                else: 
                ?>
                    <p class="text-center col-span-3 py-10 text-outline">No academy categories found. Please create them in the WordPress dashboard.</p>
                <?php endif; ?>
            </div>
        </section>

        <section class="pb-24 pt-12 px-8">
            <div class="max-w-7xl mx-auto bg-primary rounded-2xl overflow-hidden relative shadow-2xl">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-primary-container/40 via-transparent to-transparent"></div>
                <div class="relative z-10 p-12 md:p-20 text-center md:text-left grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-headline font-bold text-on-primary mb-6">Ready to optimize your operations?</h2>
                        <p class="text-primary-fixed text-lg max-w-lg mb-0 opacity-90">Our consultants help fast-growing retail and logistics teams implement the strategies discussed in this academy.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 md:justify-end">
                        <a href="/contact/" class="bg-secondary-container text-center text-on-secondary-container px-8 py-4 rounded-lg font-label text-sm uppercase tracking-widest font-bold shadow-lg hover:bg-white transition-all transform hover:-translate-y-1">
                            Talk to an Expert
                        </a>
                        <a href="/solutions/" class="border-2 border-primary-fixed text-center text-primary-fixed px-8 py-4 rounded-lg font-label text-sm uppercase tracking-widest font-bold hover:bg-primary-container transition-all">
                            View Solutions
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>
