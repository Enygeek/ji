
var nbre = 0; 		// Compteur des choix effectués
const limit = 5; 	// Limite des choix possibles

// Déclaration des booleen

var programmation, musique, design;
var sport, analyse, innovations;
var lecture, jeuxVideos, manga;

// Initialisation
programmation = musique = design = sport = analyse = innovations = 0;
lecture = jeuxVideos = manga = 0


function count (form)
{


    // Programmation
    if (form.programmation.checked == true && programmation == 0)
	{
		nbre++;
		programmation = 1;
	}
	if (form.programmation.checked == false && programmation == 1) 
	{
		nbre--;
		programmation = 0;
		activate(form);
	}

	// MUSIQUE
	if (form.musique.checked == true && musique == 0)
	{
		nbre++;
		musique = 1;
	}
	if (form.musique.checked == false && musique == 1) 
	{
		nbre--;
		musique = 0;
		activate(form);
	}

	// DESIGN
	if (form.design.checked == true && design == 0)
	{
		nbre++;
		design = 1;
	}
	if (form.design.checked == false && design == 1) 
	{
		nbre--;
		design = 0;
		activate(form);
	}

	// SPORT
	if (form.sport.checked == true && sport == 0)
	{
		nbre++;
		sport = 1;
	}
	if (form.sport.checked == false && sport == 1) 
	{
		nbre--;
		sport = 0;
		activate(form);
	}

	// ANALYSE
	if (form.analyse.checked == true && analyse == 0)
	{
		nbre++;
		analyse = 1;
	}
	if (form.analyse.checked == false && analyse == 1) 
	{
		nbre--;
		analyse = 0;
		activate(form);
	}

	// INNOVATIONS
	if (form.innovations.checked == true && innovations == 0)
	{
		nbre++;
		innovations = 1;
	}
	if (form.innovations.checked == false && innovations == 1) 
	{
		nbre--;
		innovations = 0;
		activate(form);
	}

	// LECTURE
	if (form.lecture.checked == true && lecture == 0)
	{
		nbre++;
		lecture = 1;
	}
	if (form.lecture.checked == false && lecture == 1) 
	{
		nbre--;
		lecture = 0;
		activate(form);
	}

	// JEUX VIDEOS
	if (form.jeuxVideos.checked == true && jeuxVideos == 0)
	{
		nbre++;
		jeuxVideos = 1;
	}
	if (form.jeuxVideos.checked == false && jeuxVideos == 1) 
	{
		nbre--;
		jeuxVideos = 0;
		activate(form);
	}

	// MANGA
	if (form.manga.checked == true && manga == 0)
	{
		nbre++;
		manga = 1;
	}
	if (form.manga.checked == false && manga == 1) 
	{
		nbre--;
		manga = 0;
		activate(form);
	}

	if (nbre == limit) 
	{
		if (programmation == 0) { form.programmation.disabled = true; }
		if (musique == 0) { form.musique.disabled = true; }
		if (design == 0 ) { form.design.disabled = true; }
		if (sport == 0 ) { form.sport.disabled = true; }
		if (analyse == 0 ) { form.analyse.disabled = true; }
		if (innovations == 0 ) { form.innovations.disabled = true; }
		if (lecture == 0 ) { form.lecture.disabled = true; }
		if (jeuxVideos == 0 ) { form.jeuxVideos.disabled = true; }
		if (manga == 0 ) { form.manga.disabled = true; }
		alert('Limite atteinte');
	}
}


function activate(form)
{

	if (form.programmation.disabled == true) 
	{ 
		form.programmation.disabled = false;
	}
	
	if (form.musique.disabled = true) 
	{ 
		form.musique.disabled = false;
	}
	
	if (form.design.disabled = true) 
	{ 
		form.design.disabled = false;
	}

	if (form.sport.disabled = true) 
	{ 
		form.sport.disabled = false;
	}

	if (form.analyse.disabled = true) 
	{ 
		form.analyse.disabled = false;
	}

	if (form.innovations.disabled = true) 
	{ 
		form.innovations.disabled = false;
	}

	if (form.lecture.disabled = true) 
	{ 
		form.lecture.disabled = false;
	}

	if (form.jeuxVideos.disabled = true) 
	{ 
		form.jeuxVideos.disabled = false;
	}

	if (form.manga.disabled = true) 
	{ 
		form.manga.disabled = false;
	}
	
}

