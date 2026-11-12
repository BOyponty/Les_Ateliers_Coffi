<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Exhibition;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // 1. CRÉATION DES ARTISTES
        // ==========================================
        $charbel = Artist::create([
            'name' => 'Charbel Coffi',
            'slug' => 'charbel-coffi',
            'biography' => 'Charbel Coffi est un artiste plasticien béninois né en 1985. Fondateur des Ateliers Coffi, il utilise des matériaux naturels comme le kaolin et la latérite pour créer des textures craquelées uniques. Ses thèmes de prédilection sont la réconciliation culturelle, la perte d\'identité et l\'écologie.',
            'photo' => 'artists/charbel-coffi.jpg',
            'specialty' => 'Artiste plasticien & Fondateur',
        ]);

        $sika = Artist::create([
            'name' => 'Sika da Silveira',
            'slug' => 'sika-da-silveira',
            'biography' => 'Sika da Silveira est une artiste peintre dont le travail explore le bleu comme langage, la nature et le sacré. Ses œuvres sont régulièrement présentées aux Ateliers Coffi.',
            'photo' => 'artists/sika-da-silveira.jpg',
            'specialty' => 'Peintre',
        ]);

        $princesse = Artist::create([
            'name' => 'Princesse Keirath',
            'slug' => 'princesse-keirath',
            'biography' => 'Princesse Keirath travaille l\'encre de Chine, l\'acrylique et les pigments. Sa série "The Gaani Codex" explore les rituels du Royaume de Nikki.',
            'photo' => 'artists/princesse-keirath.jpg',
            'specialty' => 'Sculptrice',
        ]);

        $jamal = Artist::create([
            'name' => 'Jamal Chleuh',
            'slug' => 'jamal-chleuh',
            'biography' => 'Jamal Chleuh est un designer et artiste dont le travail fusionne mode et peinture. Il a collaboré avec les Ateliers Coffi pour l\'événement "L\'Art nous unit, le Bénin brille !".',
            'photo' => 'artists/jamal-chleuh.jpg',
            'specialty' => 'Designer & Artiste',
        ]);

        $zanele = Artist::create([
            'name' => 'Zanele Muholi',
            'slug' => 'zanele-muholi',
            'biography' => 'Zanele Muholi est une photographe sud-africaine non-binaire, connue pour ses séries "Faces and Phases" et "Somnyama Ngonyama". Son travail explore les questions d\'identité et de représentation.',
            'photo' => 'artists/zanele-muholi.jpg',
            'specialty' => 'Photographe',
        ]);

        // ==========================================
        // 2. CRÉATION DES ŒUVRES
        // ==========================================
        Artwork::create([
            'artist_id' => $charbel->id,
            'title' => 'Réconciliation',
            'slug' => 'reconciliation',
            'description' => 'Une œuvre majestueuse explorant la réconciliation culturelle à travers des textures de kaolin et de latérite.',
            'technique' => 'Technique mixte',
            'dimensions' => '120 × 80 cm',
            'year' => '2024',
            'price' => null, // Sur demande
            'image' => 'artworks/reconciliation.jpg',
            'status' => 'disponible',
        ]);

        Artwork::create([
            'artist_id' => $sika->id,
            'title' => 'La Majestueuse',
            'slug' => 'la-majestueuse',
            'description' => 'Une explosion de bleus profonds, explorant la nature et le sacré.',
            'technique' => 'Acrylique sur toile',
            'dimensions' => '150 × 100 cm',
            'year' => '2025',
            'price' => 1500000,
            'image' => 'artworks/la-majestueuse.jpg',
            'status' => 'disponible',
        ]);

        Artwork::create([
            'artist_id' => $princesse->id,
            'title' => 'Sina Boko Gaani',
            'slug' => 'sina-boko-gaani',
            'description' => 'Une œuvre inspirée des rituels du Royaume de Nikki.',
            'technique' => 'Encre de Chine et pigments',
            'dimensions' => '90 × 70 cm',
            'year' => '2024',
            'price' => null,
            'image' => 'artworks/sina-boko-gaani.jpg',
            'status' => 'disponible',
        ]);

        Artwork::create([
            'artist_id' => $jamal->id,
            'title' => 'Bénin Brille',
            'slug' => 'benin-brille',
            'description' => 'Une création fusionnant mode et peinture, présentée lors de l\'événement "L\'Art nous unit".',
            'technique' => 'Textile et peinture',
            'dimensions' => '200 × 150 cm',
            'year' => '2025',
            'price' => 2500000,
            'image' => 'artworks/benin-brille.jpg',
            'status' => 'exposé',
        ]);

        Artwork::create([
            'artist_id' => $zanele->id,
            'title' => 'Somnyama Ngonyama',
            'slug' => 'somnyama-ngonyama',
            'description' => 'Un autoportrait puissant explorant les questions d\'identité et de représentation.',
            'technique' => 'Photographie',
            'dimensions' => '60 × 50 cm',
            'year' => '2023',
            'price' => null,
            'image' => 'artworks/somnyama-ngonyama.jpg',
            'status' => 'vendu',
        ]);

        // Ajoutons d'autres œuvres pour remplir la grille
        Artwork::create([
            'artist_id' => $charbel->id,
            'title' => 'Rooted',
            'slug' => 'rooted',
            'description' => 'Une installation explorant nos racines et notre rapport à la terre.',
            'technique' => 'Installation',
            'dimensions' => 'Dimensions variables',
            'year' => '2025',
            'price' => null,
            'image' => 'artworks/rooted.jpg',
            'status' => 'exposé',
        ]);

        Artwork::create([
            'artist_id' => $sika->id,
            'title' => 'Féminin pluriel',
            'slug' => 'feminin-pluriel',
            'description' => 'Une célébration de la diversité des voix féminines.',
            'technique' => 'Huile sur toile',
            'dimensions' => '100 × 80 cm',
            'year' => '2025',
            'price' => 1800000,
            'image' => 'artworks/feminin-pluriel.jpg',
            'status' => 'disponible',
        ]);

        // ==========================================
        // 3. CRÉATION DES EXPOSITIONS
        // ==========================================
        Exhibition::create([
            'title' => 'Dig Where You Stand',
            'slug' => 'dig-where-you-stand',
            'description' => 'Une exposition collective majeure rassemblant plus de 20 artistes autour des thèmes de la décolonisation et de la restitution. Avec Zanele Muholi, Charbel Coffi et bien d\'autres.',
            'start_date' => '15.03',
            'end_date' => '30.06.2024',
            'image' => 'exhibitions/dig-where-you-stand.jpg',
        ]);

        Exhibition::create([
            'title' => 'Celles qui transmettent',
            'slug' => 'celles-qui-transmettent',
            'description' => 'Une exposition mettant en lumière des artistes plasticiennes comme Princesse Keirath ou Sika da Silveira sur le thème de la transmission et de la condition féminine.',
            'start_date' => '10.01',
            'end_date' => '28.02.2026',
            'image' => 'exhibitions/celles-qui-transmettent.jpg',
        ]);

        Exhibition::create([
            'title' => 'Rooted - Charbel Coffi',
            'slug' => 'rooted-charbel-coffi',
            'description' => 'Le fondateur des Ateliers Coffi explore la réconciliation culturelle et l\'écologie à travers des textures de kaolin et de latérite.',
            'start_date' => '05.05',
            'end_date' => '20.07.2025',
            'image' => 'exhibitions/rooted.jpg',
        ]);

        Exhibition::create([
            'title' => 'L\'Art nous unit, le Bénin brille !',
            'slug' => 'l-art-nous-unit',
            'description' => 'Un événement qui fusionne mode et peinture avec le designer Jamal Chleuh et les artistes résidents des Ateliers Coffi.',
            'start_date' => '01.09',
            'end_date' => '15.10.2025',
            'image' => 'exhibitions/l-art-nous-unit.jpg',
        ]);

        // ==========================================
        // 4. CRÉATION DES ACTUALITÉS
        // ==========================================
        News::create([
            'title' => 'Retour sur l\'exposition "Dig Where You Stand"',
            'slug' => 'retour-exposition-dig-where-you-stand',
            'content' => 'Du 15 mars au 30 juin 2024, Les Ateliers Coffi ont accueilli "Dig Where You Stand", une exposition collective majeure rassemblant plus de 20 artistes autour des thèmes de la décolonisation et de la restitution. Cet événement a été un moment fort pour la scène artistique béninoise et pour notre galerie. Nous avons eu l\'honneur de présenter les œuvres de Zanele Muholi, Charbel Coffi, et de nombreux autres artistes engagés.',
            'image' => 'news/retour-dig-where-you-stand.jpg',
            'published_at' => now(),
        ]);

        News::create([
            'title' => 'Charbel Coffi expose à Lagos pour "Rooted"',
            'slug' => 'charbel-coffi-expose-lagos-rooted',
            'content' => 'Le fondateur des Ateliers Coffi présente son exposition personnelle "Rooted" à Lagos. Une exploration de la réconciliation culturelle et de l\'écologie à travers le kaolin et la latérite. Une occasion unique de découvrir son travail en dehors du Bénin.',
            'image' => 'news/charbel-coffi-lagos.jpg',
            'published_at' => now(),
        ]);

        News::create([
            'title' => '"Celles qui transmettent" : une exposition dédiée aux artistes plasticiennes',
            'slug' => 'celles-qui-transmettent-exposition',
            'content' => 'Découvrez "Celles qui transmettent", une exposition mettant en lumière des artistes plasticiennes comme Princesse Keirath et Sika da Silveira sur le thème de la transmission et de la condition féminine. Un événement à ne pas manquer aux Ateliers Coffi.',
            'image' => 'news/celles-qui-transmettent.jpg',
            'published_at' => now(),
        ]);
    }
}
