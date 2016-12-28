Morris.Bar({
	element: 'summary_analytics',
	data: [
		{ y: '25/12', a: 100, b: 90 },
		{ y: '26/12', a: 75,  b: 65 },
		{ y: '27/12', a: 50,  b: 40 },
		{ y: '28/12', a: 75,  b: 65 },
		{ y: '29/12', a: 50,  b: 40 },
		{ y: '30/12', a: 75,  b: 65 },
		{ y: '31/12', a: 100, b: 90 }
	],
	xkey: 'y',
	ykeys: ['a', 'b'],
	labels: ['Nam', 'Nữ'],
	barColors: ['#0B62A4', '#D30000'],
	hideHover: 'auto',
	resize: true
});