<div class="container">
	<div class="row" id="article_cluster">

	</div>
</div>
<script type="text/javascript">
	loadArticleSections();
	function loadArticleSections() {
		$.ajax({
			url: '/api/category/news/' + localStorage.getItem("issue_id"),
			success: function(result){
				// console.log(result);
				result = jQuery.parseJSON(result);
				$.each(result, function(idx,value){
					$("#article_cluster").append('<div class="col-3 px-3 align-self-center"><div class="card" onclick="gotoart('+value.id+')"><div class="card-header"><span class="text-uppercase font-weight-bold">' + value.name + '</span></div><div class="card-footer"><small>Deadline: '+value.deadline+'</small><br><small>Finished: '+value.is_done+'</small></div></div></div>');
				});
			}
		});
	}
	function gotoart(e){
		window.location.href = "/article/" + e;
	}
</script>