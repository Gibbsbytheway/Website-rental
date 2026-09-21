<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function asteria_testimonials() {
	$data = array(
		'fr' => array(
			array(
				'name' => 'Lisa',
				'text' => "Séjour parfait ! L'appartement était impeccable, très bien équipé et dans un excellent emplacement. La communication avec l'hôte était excellente, réactive et bienveillante. Je recommande vivement et je reviendrai sans hésiter lors de mon prochain passage dans la région.",
			),
			array(
				'name' => 'Antoine',
				'text' => "Un accueil chaleureux et un logement qui dépasse toutes nos attentes ! Tout était parfait : la propreté, l'équipement, la localisation. Les petites attentions (thé, café, guide de bienvenue) ont vraiment fait la différence. Un séjour mémorable, merci !",
			),
			array(
				'name' => 'Marie',
				'text' => "Exceptionnel ! L'appartement est magnifique, très fonctionnel et parfaitement situé. L'hôte a été aux petits soins, disponible et très arrangeant. Le check-in autonome était très pratique. Je recommande à 100% et je reviendrai certainement !",
			),
		),
		'en' => array(
			array(
				'name' => 'Lisa',
				'text' => "Perfect stay! The apartment was spotless, very well equipped and in an excellent location. Communication with the host was excellent, responsive and friendly. I highly recommend it and will definitely come back next time I'm in the area.",
			),
			array(
				'name' => 'Antoine',
				'text' => "A warm welcome and a place that exceeded all our expectations! Everything was perfect: cleanliness, amenities, location. The little touches (tea, coffee, welcome guide) really made the difference. A memorable stay, thank you!",
			),
			array(
				'name' => 'Marie',
				'text' => "Exceptional! The apartment is beautiful, very functional and perfectly located. The host was attentive, available and very accommodating. Self check-in was very convenient. I recommend it 100% and will definitely come back!",
			),
		),
		'it' => array(
			array(
				'name' => 'Lisa',
				'text' => "Soggiorno perfetto! L'appartamento era impeccabile, molto ben attrezzato e in un'ottima posizione. La comunicazione con l'host è stata eccellente, reattiva e cordiale. Lo consiglio vivamente e tornerò sicuramente al mio prossimo passaggio in zona.",
			),
			array(
				'name' => 'Antoine',
				'text' => "Un'accoglienza calorosa e un alloggio che ha superato tutte le nostre aspettative! Tutto era perfetto: pulizia, attrezzature, posizione. I piccoli dettagli (tè, caffè, guida di benvenuto) hanno fatto davvero la differenza. Un soggiorno memorabile, grazie!",
			),
			array(
				'name' => 'Marie',
				'text' => "Eccezionale! L'appartamento è magnifico, molto funzionale e perfettamente posizionato. L'host è stato premuroso, disponibile e molto flessibile. Il check-in autonomo è stato molto comodo. Lo consiglio al 100% e tornerò sicuramente!",
			),
		),
		'es' => array(
			array(
				'name' => 'Lisa',
				'text' => "¡Estancia perfecta! El apartamento estaba impecable, muy bien equipado y en una excelente ubicación. La comunicación con el anfitrión fue excelente, receptiva y amable. Lo recomiendo encarecidamente y volveré sin dudarlo en mi próxima visita a la región.",
			),
			array(
				'name' => 'Antoine',
				'text' => "¡Una bienvenida cálida y un alojamiento que superó todas nuestras expectativas! Todo fue perfecto: la limpieza, el equipamiento, la ubicación. Los pequeños detalles (té, café, guía de bienvenida) marcaron realmente la diferencia. Una estancia memorable, ¡gracias!",
			),
			array(
				'name' => 'Marie',
				'text' => "¡Excepcional! El apartamento es precioso, muy funcional y perfectamente ubicado. El anfitrión fue atento, disponible y muy flexible. El check-in autónomo fue muy práctico. ¡Lo recomiendo al 100% y volveré sin duda!",
			),
		),
		'pt' => array(
			array(
				'name' => 'Lisa',
				'text' => "Estadia perfeita! O apartamento estava impecável, muito bem equipado e numa excelente localização. A comunicação com o anfitrião foi excelente, rápida e simpática. Recomendo vivamente e voltarei sem hesitar na minha próxima passagem pela região.",
			),
			array(
				'name' => 'Antoine',
				'text' => "Um acolhimento caloroso e um alojamento que superou todas as nossas expectativas! Tudo estava perfeito: a limpeza, o equipamento, a localização. Os pequenos detalhes (chá, café, guia de boas-vindas) fizeram mesmo a diferença. Uma estadia memorável, obrigado!",
			),
			array(
				'name' => 'Marie',
				'text' => "Excecional! O apartamento é lindo, muito funcional e perfeitamente localizado. O anfitrião foi atencioso, disponível e muito flexível. O check-in autónomo foi muito prático. Recomendo a 100% e voltarei certamente!",
			),
		),
		'de' => array(
			array(
				'name' => 'Lisa',
				'text' => 'Perfekter Aufenthalt! Die Wohnung war makellos, sehr gut ausgestattet und in einer ausgezeichneten Lage. Die Kommunikation mit dem Gastgeber war hervorragend, schnell und freundlich. Ich empfehle es sehr und werde bei meinem nächsten Besuch in der Region auf jeden Fall wiederkommen.',
			),
			array(
				'name' => 'Antoine',
				'text' => 'Ein herzlicher Empfang und eine Unterkunft, die alle unsere Erwartungen übertroffen hat! Alles war perfekt: Sauberkeit, Ausstattung, Lage. Die kleinen Aufmerksamkeiten (Tee, Kaffee, Willkommensguide) haben wirklich den Unterschied gemacht. Ein unvergesslicher Aufenthalt, danke!',
			),
			array(
				'name' => 'Marie',
				'text' => 'Außergewöhnlich! Die Wohnung ist wunderschön, sehr funktional und perfekt gelegen. Der Gastgeber war aufmerksam, erreichbar und sehr entgegenkommend. Der selbstständige Check-in war sehr praktisch. Ich empfehle es zu 100 % und komme sicher wieder!',
			),
		),
	);

	$lang = asteria_current_lang();
	return isset( $data[ $lang ] ) ? $data[ $lang ] : $data['fr'];
}

function asteria_why_us() {
	$data = array(
		'fr' => array(
			array(
				'titre' => 'Meilleur tarif garanti',
				'texte' => "Réservez directement sur notre site et bénéficiez toujours du meilleur tarif disponible. Si vous trouvez un prix inférieur ailleurs pour le même logement et les mêmes dates, faites-nous signe pour qu'on s'aligne !",
			),
			array(
				'titre' => 'Contact direct et rapide',
				'texte' => "En réservant en direct, vous profitez d'une communication simplifiée et rapide avec notre équipe locale, disponible pour répondre à vos questions et vous assister tout au long de votre séjour. Profitez d'un accueil personnalisé et de recommandations sur mesure.",
			),
			array(
				'titre' => 'Avantages exclusifs',
				'texte' => "En réservant directement sur notre site, bénéficiez de possibilités sur demande telles que l'arrivée anticipée, le départ tardif, et des offres spéciales réservées uniquement à nos voyageurs directs.",
			),
		),
		'en' => array(
			array(
				'titre' => 'Best rate guaranteed',
				'texte' => "Book directly on our site and always get the best available rate. If you find a lower price elsewhere for the same property and the same dates, let us know and we'll match it!",
			),
			array(
				'titre' => 'Direct and fast contact',
				'texte' => 'By booking directly, you enjoy simple and fast communication with our local team, available to answer your questions and assist you throughout your stay. Enjoy a personalised welcome and tailored recommendations.',
			),
			array(
				'titre' => 'Exclusive benefits',
				'texte' => 'By booking directly on our site, you can request perks such as early check-in, late check-out, and special offers reserved exclusively for our direct guests.',
			),
		),
		'it' => array(
			array(
				'titre' => 'Miglior tariffa garantita',
				'texte' => 'Prenota direttamente sul nostro sito e ottieni sempre la miglior tariffa disponibile. Se trovi un prezzo più basso altrove per lo stesso alloggio e le stesse date, faccelo sapere e ci allineeremo!',
			),
			array(
				'titre' => 'Contatto diretto e rapido',
				'texte' => "Prenotando in diretta, usufruisci di una comunicazione semplice e rapida con il nostro team locale, disponibile per rispondere alle tue domande e assisterti durante tutto il soggiorno. Goditi un'accoglienza personalizzata e consigli su misura.",
			),
			array(
				'titre' => 'Vantaggi esclusivi',
				'texte' => "Prenotando direttamente sul nostro sito, puoi richiedere agevolazioni come l'arrivo anticipato, la partenza posticipata e offerte speciali riservate esclusivamente ai nostri ospiti diretti.",
			),
		),
		'es' => array(
			array(
				'titre' => 'Mejor tarifa garantizada',
				'texte' => 'Reserva directamente en nuestro sitio y obtén siempre la mejor tarifa disponible. Si encuentras un precio más bajo en otro sitio para el mismo alojamiento y las mismas fechas, avísanos y nos ajustaremos.',
			),
			array(
				'titre' => 'Contacto directo y rápido',
				'texte' => 'Al reservar en directo, disfrutas de una comunicación sencilla y rápida con nuestro equipo local, disponible para responder tus preguntas y ayudarte durante toda tu estancia. Disfruta de una bienvenida personalizada y recomendaciones a medida.',
			),
			array(
				'titre' => 'Ventajas exclusivas',
				'texte' => 'Al reservar directamente en nuestro sitio, puedes solicitar ventajas como llegada anticipada, salida tardía y ofertas especiales reservadas exclusivamente a nuestros huéspedes directos.',
			),
		),
		'pt' => array(
			array(
				'titre' => 'Melhor tarifa garantida',
				'texte' => 'Reserve diretamente no nosso site e beneficie sempre da melhor tarifa disponível. Se encontrar um preço mais baixo noutro lugar para o mesmo alojamento e as mesmas datas, avise-nos e ajustamos o preço!',
			),
			array(
				'titre' => 'Contacto direto e rápido',
				'texte' => 'Ao reservar diretamente, beneficia de uma comunicação simples e rápida com a nossa equipa local, disponível para responder às suas perguntas e ajudá-lo durante toda a estadia. Aproveite um acolhimento personalizado e recomendações à medida.',
			),
			array(
				'titre' => 'Vantagens exclusivas',
				'texte' => 'Ao reservar diretamente no nosso site, pode solicitar vantagens como check-in antecipado, check-out tardio e ofertas especiais reservadas exclusivamente aos nossos hóspedes diretos.',
			),
		),
		'de' => array(
			array(
				'titre' => 'Bester Preis garantiert',
				'texte' => 'Buchen Sie direkt auf unserer Website und erhalten Sie immer den besten verfügbaren Preis. Wenn Sie anderswo einen günstigeren Preis für dieselbe Unterkunft und dieselben Daten finden, sagen Sie uns Bescheid und wir passen uns an!',
			),
			array(
				'titre' => 'Direkter und schneller Kontakt',
				'texte' => 'Bei einer Direktbuchung profitieren Sie von einer einfachen und schnellen Kommunikation mit unserem lokalen Team, das Ihre Fragen beantwortet und Sie während Ihres gesamten Aufenthalts unterstützt. Genießen Sie einen persönlichen Empfang und maßgeschneiderte Empfehlungen.',
			),
			array(
				'titre' => 'Exklusive Vorteile',
				'texte' => 'Bei einer Direktbuchung auf unserer Website können Sie Vorteile wie einen frühen Check-in, einen späten Check-out und spezielle Angebote anfragen, die ausschließlich unseren Direktgästen vorbehalten sind.',
			),
		),
	);

	$lang = asteria_current_lang();
	return isset( $data[ $lang ] ) ? $data[ $lang ] : $data['fr'];
}

function asteria_faq() {
	$data = array(
		'fr' => array(
			array(
				'q' => "Quelles sont les heures d'arrivée et de départ ?",
				'a' => "Le check-in (arrivée dans l'appartement) est possible à partir de 16h et le check-out (départ de l'appartement) doit être fait au plus tard à 11h. Les horaires précis peuvent varier légèrement selon le logement, voir la fiche du logement concerné.",
			),
			array(
				'q' => 'Comment se déroule la remise des clés ?',
				'a' => "Pour vous garantir une certaine flexibilité et une remise des clés sans contact, nous avons mis en place un système d'ouverture de porte automatique avec une application sur smartphone. Suite à votre réservation, vous recevez un lien unique, généré automatiquement par notre système, qui vous permettra d'accéder facilement au logement.",
			),
			array(
				'q' => 'Le parking est-il inclus ?',
				'a' => 'Oui, le parking est inclus pour tous nos logements.',
			),
			array(
				'q' => 'Les serviettes de bain sont-elles fournies ?',
				'a' => 'Oui, les draps et les serviettes sont fournis, ainsi que les torchons pour la cuisine.',
			),
			array(
				'q' => 'Le ménage est-il inclus dans le séjour ?',
				'a' => 'Oui. Les frais de ménage sont obligatoires pour toutes les réservations. On ne vous demande que de faire la vaisselle et de sortir les poubelles.',
			),
			array(
				'q' => 'Annulation de location',
				'a' => 'Toutes les réservations sont remboursables sous certaines conditions.',
			),
		),
		'en' => array(
			array(
				'q' => 'What are the check-in and check-out times?',
				'a' => 'Check-in is possible from 4pm and check-out must be done by 11am at the latest. Exact times may vary slightly by property, see the relevant listing.',
			),
			array(
				'q' => 'How does key handover work?',
				'a' => "To ensure flexibility and a contactless handover, we've set up an automatic door-opening system with a smartphone app. After your booking, you'll receive a unique link, generated automatically by our system, giving you easy access to the property.",
			),
			array(
				'q' => 'Is parking included?',
				'a' => 'Yes, parking is included for all our properties.',
			),
			array(
				'q' => 'Are bath towels provided?',
				'a' => 'Yes, bed linen and towels are provided, as well as kitchen tea towels.',
			),
			array(
				'q' => 'Is cleaning included in the stay?',
				'a' => 'Yes. Cleaning fees are mandatory for all bookings. We only ask you to do the dishes and take out the trash.',
			),
			array(
				'q' => 'Cancellation policy',
				'a' => 'All bookings are refundable under certain conditions.',
			),
		),
		'it' => array(
			array(
				'q' => 'Quali sono gli orari di arrivo e partenza?',
				'a' => "Il check-in è possibile a partire dalle 16:00 e il check-out deve essere effettuato entro le 11:00. Gli orari esatti possono variare leggermente in base all'alloggio, consulta la scheda dell'alloggio in questione.",
			),
			array(
				'q' => 'Come avviene la consegna delle chiavi?',
				'a' => 'Per garantirti flessibilità e una consegna delle chiavi senza contatto, abbiamo predisposto un sistema di apertura automatica della porta tramite app per smartphone. Dopo la prenotazione, riceverai un link unico, generato automaticamente dal nostro sistema, che ti permetterà di accedere facilmente all\'alloggio.',
			),
			array(
				'q' => 'Il parcheggio è incluso?',
				'a' => 'Sì, il parcheggio è incluso per tutti i nostri alloggi.',
			),
			array(
				'q' => 'Gli asciugamani sono forniti?',
				'a' => 'Sì, lenzuola e asciugamani sono forniti, così come gli strofinacci da cucina.',
			),
			array(
				'q' => 'Le pulizie sono incluse nel soggiorno?',
				'a' => 'Sì. Le spese di pulizia sono obbligatorie per tutte le prenotazioni. Ti chiediamo solo di lavare i piatti e portare fuori la spazzatura.',
			),
			array(
				'q' => 'Annullamento della prenotazione',
				'a' => 'Tutte le prenotazioni sono rimborsabili a determinate condizioni.',
			),
		),
		'es' => array(
			array(
				'q' => '¿Cuáles son los horarios de entrada y salida?',
				'a' => 'El check-in es posible a partir de las 16h y el check-out debe realizarse antes de las 11h como máximo. Los horarios exactos pueden variar ligeramente según el alojamiento, consulta la ficha del alojamiento correspondiente.',
			),
			array(
				'q' => '¿Cómo se realiza la entrega de llaves?',
				'a' => 'Para garantizar flexibilidad y una entrega de llaves sin contacto, hemos implementado un sistema de apertura automática de puerta con una aplicación para smartphone. Tras tu reserva, recibirás un enlace único, generado automáticamente por nuestro sistema, que te permitirá acceder fácilmente al alojamiento.',
			),
			array(
				'q' => '¿El parking está incluido?',
				'a' => 'Sí, el parking está incluido en todos nuestros alojamientos.',
			),
			array(
				'q' => '¿Se proporcionan toallas de baño?',
				'a' => 'Sí, se proporcionan sábanas y toallas, así como paños de cocina.',
			),
			array(
				'q' => '¿La limpieza está incluida en la estancia?',
				'a' => 'Sí. Los gastos de limpieza son obligatorios para todas las reservas. Solo te pedimos que friegues los platos y saques la basura.',
			),
			array(
				'q' => 'Cancelación de la reserva',
				'a' => 'Todas las reservas son reembolsables bajo ciertas condiciones.',
			),
		),
		'pt' => array(
			array(
				'q' => 'Quais são os horários de check-in e check-out?',
				'a' => 'O check-in é possível a partir das 16h e o check-out deve ser feito até às 11h, o mais tardar. Os horários exatos podem variar ligeiramente consoante o alojamento, consulte a ficha do alojamento em questão.',
			),
			array(
				'q' => 'Como funciona a entrega das chaves?',
				'a' => 'Para garantir flexibilidade e uma entrega de chaves sem contacto, implementámos um sistema de abertura automática da porta com uma aplicação no smartphone. Após a sua reserva, receberá um link único, gerado automaticamente pelo nosso sistema, que lhe permitirá aceder facilmente ao alojamento.',
			),
			array(
				'q' => 'O estacionamento está incluído?',
				'a' => 'Sim, o estacionamento está incluído em todos os nossos alojamentos.',
			),
			array(
				'q' => 'As toalhas de banho são fornecidas?',
				'a' => 'Sim, os lençóis e as toalhas são fornecidos, assim como os panos de cozinha.',
			),
			array(
				'q' => 'A limpeza está incluída na estadia?',
				'a' => 'Sim. As taxas de limpeza são obrigatórias para todas as reservas. Pedimos apenas que lave a loiça e retire o lixo.',
			),
			array(
				'q' => 'Cancelamento da reserva',
				'a' => 'Todas as reservas são reembolsáveis sob certas condições.',
			),
		),
		'de' => array(
			array(
				'q' => 'Wie sind die Check-in- und Check-out-Zeiten?',
				'a' => 'Der Check-in ist ab 16 Uhr möglich, der Check-out muss spätestens um 11 Uhr erfolgen. Die genauen Zeiten können je nach Unterkunft leicht variieren, siehe die jeweilige Unterkunftsseite.',
			),
			array(
				'q' => 'Wie funktioniert die Schlüsselübergabe?',
				'a' => 'Um Ihnen Flexibilität und eine kontaktlose Übergabe zu garantieren, haben wir ein automatisches Türöffnungssystem mit einer Smartphone-App eingerichtet. Nach Ihrer Buchung erhalten Sie einen einzigartigen Link, der automatisch von unserem System generiert wird und Ihnen den einfachen Zugang zur Unterkunft ermöglicht.',
			),
			array(
				'q' => 'Ist ein Parkplatz inbegriffen?',
				'a' => 'Ja, ein Parkplatz ist bei allen unseren Unterkünften inbegriffen.',
			),
			array(
				'q' => 'Werden Badetücher zur Verfügung gestellt?',
				'a' => 'Ja, Bettwäsche und Handtücher werden ebenso wie Küchentücher zur Verfügung gestellt.',
			),
			array(
				'q' => 'Ist die Reinigung im Aufenthalt inbegriffen?',
				'a' => 'Ja. Die Reinigungsgebühr ist für alle Buchungen verpflichtend. Wir bitten Sie lediglich, das Geschirr zu spülen und den Müll rauszubringen.',
			),
			array(
				'q' => 'Stornierung der Buchung',
				'a' => 'Alle Buchungen sind unter bestimmten Bedingungen erstattungsfähig.',
			),
		),
	);

	$lang = asteria_current_lang();
	return isset( $data[ $lang ] ) ? $data[ $lang ] : $data['fr'];
}
