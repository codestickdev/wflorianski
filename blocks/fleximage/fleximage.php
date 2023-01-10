<?php
/**
 * Fleximage Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'fleximage-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$image01 = get_field( 'image_01' );
$image02 = get_field( 'image_02' );

?>
<div <?php echo $anchor; ?>class="fleximage <?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <div class="fleximage__image">
        <img src="<?php echo $image01['url']; ?>" alt="<?php echo $image01['alt']; ?>"/>
    </div>
    <div class="fleximage__image">
        <img src="<?php echo $image02['url']; ?>" alt="<?php echo $image02['alt']; ?>"/>
    </div>
</div>