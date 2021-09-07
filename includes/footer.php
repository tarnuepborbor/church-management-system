<div class="row">
    <div class="col-md-6 offset-md-3 py-4 text-center text-secondary">
        <p>© 2021 by <a href="https://github.com/tarnuepborbor">Tarnue P. Borbor</a> 
    </div>
</div>

<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript">

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
});



	$(document).ready(function() {
		$('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	} );
</script>
</body>
</html>