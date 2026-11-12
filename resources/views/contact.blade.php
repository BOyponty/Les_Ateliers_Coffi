@extends('layouts.app')

@section('content')
    <section class="container mx-auto px-4 py-16 max-w-6xl">

        <!-- Section 1 : Titre et 2 blocs (Image + Texte) -->
        <div class="mb-16">
            <h2 class="text-base font-medium mb-6 uppercase">L'HISTOIRE DES ATELIERS COFFI</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Bloc Image -->
                <div class="bg-[#f9f9f9] border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] h-[350px] flex items-center justify-center text-gray-400">
                    Photo de l'Atelier
                </div>
                <!-- Bloc Texte -->
                <div class="bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] p-10 flex flex-col justify-center">
                    <div class="space-y-6 text-gray-700 font-light text-[15px] leading-relaxed">
                        <p>
                            Fondés par l'artiste plasticien béninois <strong>Charbel Coffi</strong> et dirigés par <strong>Mélissa Ilboudo Houadjeto</strong>, Les Ateliers Coffi sont un espace d'art contemporain situé à Fidjrossè, Cotonou.
                        </p>
                        <p>
                            Plus qu'une simple galerie, c'est un véritable centre culturel qui combine espace d'exposition, ateliers de création et un jardin ouvert sur la ville. Nous dynamisons la scène artistique béninoise en accueillant des artistes locaux et internationaux.
                        </p>
                        <p>
                            Notre mission est de créer un pont entre les cultures, de favoriser la réconciliation et de mettre en lumière la richesse de l'art africain contemporain.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2 : Titre et grand bloc texte -->
        <div class="mb-16">
            <h2 class="text-base font-medium mb-6 uppercase">NOTRE APPROCHE</h2>
            <div class="bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] p-10">
                <div class="space-y-4 text-gray-700 font-light text-[15px] leading-relaxed">
                    <p>
                        À travers des expositions collectives et personnelles, nous explorons des thèmes forts comme la décolonisation, la restitution, la transmission et l'écologie. Des artistes comme Zanele Muholi, Sika da Silveira ou Princesse Keirath ont marqué notre programmation.
                    </p>
                    <p>
                        Nous croyons en la puissance de l'art pour transformer les regards et construire des ponts entre les peuples. Chaque exposition est une invitation à découvrir une nouvelle facette de la création contemporaine africaine.
                    </p>
                </div>
            </div>
        </div>

        <!-- Section 3 : Equipe & Galerie -->
        <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            <h3 class="text-[15px] font-medium text-gray-800">L'Équipe</h3>
            <h3 class="text-[15px] font-medium text-gray-800">La Galerie</h3>
        </div>

        <!-- Section 4 : Equipe & Galerie (Encadrés) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Bloc Equipe (Texte centré) -->
            <div class="bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] p-10 flex flex-col items-center justify-center text-center space-y-10">
                <!-- Membre 1 -->
                <div class="space-y-1.5">
                    <p class="text-[15px] font-medium text-gray-900">Charbel Coffi</p>
                    <p class="text-[14px] text-gray-600 font-light">Artiste plasticien & Fondateur</p>
                    <p class="text-[14px] text-gray-600 font-light">Direction artistique</p>
                </div>
                <!-- Membre 2 -->
                <div class="space-y-1.5">
                    <p class="text-[15px] font-medium text-gray-900">Mélissa Ilboudo Houadjeto</p>
                    <p class="text-[14px] text-gray-600 font-light">Directrice de la Galerie</p>
                    <p class="text-[14px] text-gray-600 font-light">Programmation & Développement</p>
                </div>
            </div>

            <!-- Bloc Galerie (Texte centré) -->
            <div class="bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] p-10 flex flex-col items-center justify-center text-center space-y-8">
                <div class="space-y-1">
                    <p class="text-[15px] font-medium text-gray-900">Les Ateliers Coffi</p>
                    <p class="text-[15px] text-gray-700 font-light">Fidjrossè, Cotonou</p>
                    <p class="text-[15px] text-gray-700 font-light">Bénin</p>
                </div>
                <div class="space-y-1">
                    <p class="text-[15px] text-gray-700 font-light">Ouvert du mardi au dimanche</p>
                    <p class="text-[15px] text-gray-700 font-light">de 10h à 18h</p>
                </div>
                <div class="space-y-1">
                    <p class="text-[15px] font-medium text-gray-900">Contact</p>
                    <p class="text-[15px] text-gray-700 font-light">contact@atelierscoffi.com</p>
                    <p class="text-[15px] text-gray-700 font-light">+229 XX XX XX XX</p>
                </div>
            </div>
        </div>

        <!-- Section 5 : Newsletter & Carte -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Bloc Newsletter -->
            <div class="bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] p-8 flex flex-col justify-between">
                <div>
                    <h3 class="text-[15px] font-medium text-gray-800 mb-6">Inscription à la Newsletter</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-[13px] text-gray-600 mb-2 font-light">Email</label>
                            <input type="email" class="w-full border border-gray-200 px-3 py-2.5 text-sm focus:outline-none focus:border-gray-400">
                        </div>
                        <button type="submit" class="bg-[#1a1a1a] text-white px-6 py-2.5 text-xs font-medium uppercase tracking-widest hover:bg-gray-800 transition">
                            S'inscrire
                        </button>
                    </form>
                </div>
                <p class="text-[10px] text-gray-500 leading-relaxed mt-10">
                    Votre adresse e-mail est uniquement utilisée pour vous envoyer notre newsletter et des informations sur les activités des Ateliers Coffi. Vous pouvez toujours utiliser le lien de désinscription inclus dans la newsletter.
                </p>
            </div>

            <!-- Bloc Carte (Iframe Google Maps) -->
            <div class="bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] min-h-[300px] relative overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.388699468839!2d2.383125314769214!3d6.36534899565042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1024a8d4f3b4b0f5%3A0x7e3b3c3c3c3c3c3c!2sFidjross%C3%A8%2C%20Cotonou%2C%20B%C3%A9nin!5e0!3m2!1sfr!2sbj!4v1715000000000!5m2!1sfr!2sbj"
                    width="100%"
                    height="100%"
                    style="border:0; min-height: 300px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

    </section>
@endsection
