
//MANA SYMBOLS
var symbol = {
	tap:'<i class="ms ms-tap ms-cost"></i>',
	w: '<i class="ms ms-w ms-cost ms-shadow"></i>',
	u: '<i class="ms ms-u ms-cost ms-shadow"></i>',
	b: '<i class="ms ms-b ms-cost ms-shadow"></i>',
	r: '<i class="ms ms-r ms-cost ms-shadow"></i>',
	g: '<i class="ms ms-g ms-cost ms-shadow"></i>',
	c: '<i class="ms ms-c ms-cost ms-shadow"></i>',
	wp: '<i class="ms ms-wp ms-cost ms-shadow"></i>',
	up: '<i class="ms ms-up ms-cost ms-shadow"></i>',
	bp: '<i class="ms ms-bp ms-cost ms-shadow"></i>',
	rp: '<i class="ms ms-rp ms-cost ms-shadow"></i>',
	gp: '<i class="ms ms-gp ms-cost ms-shadow"></i>',
	s: '<i class="ms ms-s ms-cost ms-shadow"></i>',
	zero: '<i class="ms ms-0 ms-cost ms-shadow"></i>',
	one: '<i class="ms ms-1 ms-cost ms-shadow"></i>',
	two: '<i class="ms ms-2 ms-cost ms-shadow"></i>',
	three: '<i class="ms ms-3 ms-cost ms-shadow"></i>',
	four: '<i class="ms ms-4 ms-cost ms-shadow"></i>',
	five: '<i class="ms ms-5 ms-cost ms-shadow"></i>',
	six: '<i class="ms ms-6 ms-cost ms-shadow"></i>',
	seven: '<i class="ms ms-7 ms-cost ms-shadow"></i>',
	eight: '<i class="ms ms-8 ms-cost ms-shadow"></i>',
	nine: '<i class="ms ms-9 ms-cost ms-shadow"></i>',
	ten: '<i class="ms ms-10 ms-cost ms-shadow"></i>',
	energy: '<i class="ms ms-e ms-shadow"></i>',
};
var oracle = document.getElementsByClassName('oracle')[0].innerHTML;
var text = document.getElementsByClassName('oracle')[0];

if (oracle.indexOf("{T}") >= 0) //TAP
{
var replacement = text.innerHTML.replace(/{T}/g, symbol.tap);
text.innerHTML = replacement;
} if (oracle.indexOf("{W}") >= 0) //WHITE
{
var replacement = text.innerHTML.replace(/{W}/g, symbol.w);
text.innerHTML = replacement;	
} if (oracle.indexOf("{U}") >= 0) //BLUE
{
var replacement = text.innerHTML.replace(/{U}/g, symbol.u);
text.innerHTML = replacement;	
} if (oracle.indexOf("{B}") >= 0) //BLACK
{
var replacement = text.innerHTML.replace(/{B}/g, symbol.b);
text.innerHTML = replacement;	
} if (oracle.indexOf("{R}") >= 0) //RED
{
var replacement = text.innerHTML.replace(/{R}/g, symbol.r);
text.innerHTML = replacement;	
} if (oracle.indexOf("{G}") >= 0) //GREEN
{
var replacement = text.innerHTML.replace(/{G}/g, symbol.g);
text.innerHTML = replacement;	
} if (oracle.indexOf("{c}") >= 0) //COLORLESS
{
var replacement = text.innerHTML.replace(/{C}/g, symbol.c);
text.innerHTML = replacement;	
}

if (oracle.indexOf("{W/P}") >= 0) //WHITE PHYREXIAN
{
var replacement = text.innerHTML.replace(/{W\/P}/g, symbol.wp);
text.innerHTML = replacement;	
} if (oracle.indexOf("{U/P}") >= 0) //BLUE PHYREXIAN
{
var replacement = text.innerHTML.replace(/{U\/P}/g, symbol.up);
text.innerHTML = replacement;	
} if (oracle.indexOf("{B/P}") >= 0) //BLACK PHYREXIAN
{
var replacement = text.innerHTML.replace(/{B\/P}/g, symbol.bp);
text.innerHTML = replacement;	
} if (oracle.indexOf("{R/P}") >= 0) //RED PHYREXIAN
{
var replacement = text.innerHTML.replace(/{R\/P}/g, symbol.rp);
text.innerHTML = replacement;	
} if (oracle.indexOf("{G/P}") >= 0) //GREEN PHYREXIAN
{
var replacement = text.innerHTML.replace(/{G\/P}/g, symbol.gp);
text.innerHTML = replacement;	
}

if (oracle.indexOf("{0}") >= 0) //0
{
var replacement = text.innerHTML.replace(/{0\}/g, symbol.zero);
text.innerHTML = replacement;	
} if (oracle.indexOf("{1}") >= 0) //1
{
var replacement = text.innerHTML.replace(/{1\}/g, symbol.one);
text.innerHTML = replacement;	
} if (oracle.indexOf("{2}") >= 0) //2
{
var replacement = text.innerHTML.replace(/{2\}/g, symbol.two);
text.innerHTML = replacement;	
} if (oracle.indexOf("{3}") >= 0) //3
{
var replacement = text.innerHTML.replace(/{3\}/g, symbol.three);
text.innerHTML = replacement;	
}  if (oracle.indexOf("{4}") >= 0) //4
{
var replacement = text.innerHTML.replace(/{4\}/g, symbol.four);
text.innerHTML = replacement;	
} if (oracle.indexOf("{5}") >= 0) //5
{
var replacement = text.innerHTML.replace(/{5\}/g, symbol.five);
text.innerHTML = replacement;	
} if (oracle.indexOf("{6}") >= 0) //6
{
var replacement = text.innerHTML.replace(/{6\}/g, symbol.six);
text.innerHTML = replacement;	
} if (oracle.indexOf("{7}") >= 0) //7
{
var replacement = text.innerHTML.replace(/{7\}/g, symbol.seven);
text.innerHTML = replacement;	
}  if (oracle.indexOf("{8}") >= 0) //8
{
var replacement = text.innerHTML.replace(/{8\}/g, symbol.eight);
text.innerHTML = replacement;	
} if (oracle.indexOf("{9}") >= 0) //9
{
var replacement = text.innerHTML.replace(/{9\}/g, symbol.nine);
text.innerHTML = replacement;	
}  if (oracle.indexOf("{10}") >= 0) //10
{
var replacement = text.innerHTML.replace(/{10\}/g, symbol.ten);
text.innerHTML = replacement;	
}

if (oracle.indexOf("{S}") >= 0) //SNOW
{
var replacement = text.innerHTML.replace(/{S}/g, symbol.s);
text.innerHTML = replacement;	
} if (oracle.indexOf("{E}") >= 0) //ENERGY
{
var replacement = text.innerHTML.replace(/{E}/g, symbol.energy);
text.innerHTML = replacement;	
}
