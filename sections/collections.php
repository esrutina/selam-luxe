<section class="section-padding collections" id="collections">
    <div class="container">
        <div class="text-center reveal">
            <span class="section-label">The Collections</span>
            <h2>Inspired by Regions,<br>Crafted for Eternity</h2>
            <div class="gold-divider"></div>
        </div>
        
        <div class="grid-3 stagger-children" id="collectionsGrid">
            <?php
            // For now, use static data. Later we'll fetch from Supabase
            $collections = [
                [
                    'name' => 'Tigray Crown',
                    'region' => 'Northern Highlands',
                    'image' => 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=600&h=800&fit=crop',
                    'price' => 45000
                ],
                [
                    'name' => 'Oromo Filigree',
                    'region' => 'Central Plateau',
                    'image' => 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=600&h=800&fit=crop',
                    'price' => 32000
                ],
                [
                    'name' => 'Amhara Cross',
                    'region' => 'Historic Route',
                    'image' => 'https://images.unsplash.com/photo-1617038260897-41a1f14a8ca0?w=600&h=800&fit=crop',
                    'price' => 28000
                ]
            ];
            
            foreach ($collections as $item): ?>
            <article class="product-card reveal">
                <img src="<?= e($item['image']) ?>" 
                     alt="<?= e($item['name']) ?>" 
                     loading="lazy">
                <div class="overlay">
                    <span class="section-label"><?= e($item['region']) ?></span>
                    <h3><?= e($item['name']) ?></h3>
                    <p class="price"><?= formatPrice($item['price']) ?></p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>