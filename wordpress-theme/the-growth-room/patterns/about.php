<?php
/**
 * Title: About Me
 * Slug: the-growth-room/about
 * Categories: the-growth-room, about
 * Description: Headshot with your story and credentials.
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"About Me"},"anchor":"about","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<section id="about" class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"44%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:44%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"tgr-headshot"} -->
<figure class="wp-block-image size-full tgr-headshot"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/headshot-placeholder.svg' ) ); ?>" alt="Portrait of your coach at The Growth Room"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"56%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:56%"><!-- wp:paragraph {"className":"tgr-eyebrow"} -->
<p class="tgr-eyebrow">About Me</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Hi, I’m [Your Name].</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>I started The Growth Room because I believe everyone deserves a space where they can be honest about where they are — and hopeful about where they’re going.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[Share a little of your story here: what led you to coaching, the moment things shifted for you, and the kind of people you love working with. Two or three short paragraphs feel personal without being overwhelming.]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>My approach is gentle but direct. I’ll listen deeply, ask the questions that matter, and help you turn insight into action that actually fits your life.</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"tgr-pills"} -->
<ul class="wp-block-list tgr-pills"><!-- wp:list-item -->
<li>[Certification / training]</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>[Years of experience]</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>[Specialty or focus area]</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
