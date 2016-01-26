var baseurl = "http://api.translationnetwork.org";
var availabeTags;
		
		$(function() {
			$.getJSON(baseurl + "/languages", function(data){
				availableTags = data;
				$( "#lang" ).autocomplete({
					source: availableTags
				});
				$("#lang").keypress(function(e){
					if(e.which == 13){
						var search = $("#lang").val();
						document.getElementById("contenttitle").innerHTML = "Search Results for " + search;
						$.getJSON(baseurl + "/search?language=" + search, function(response){
							var appending = "";
							for(var i = 0; i < response.length; i++){
								var respText = "";
								$.ajax({
									url: baseurl + "/article/"+response[i].id,
									async: false,
									dataType: 'json',
									success: function(data){
										respText = data.text;
									}
								});
								if(response[i].is_translation == "0"){
								appending += "<div class='entry'><h2 class='entrytitle'>" + response[i].title + "</h2><p class='entryauthor'>Original work by " + response[i].author_name + "</p><hr class='entryline'>" + respText + "</div>";
								}
								else{
								var orginal_author = "";
								var original_lang = "";
								$.ajax({
									url: baseurl + "/article/" + response[i].parent_id,
									async:false,
									dataType: 'json',
									success: function(data){
										original_author = data.author_name;
										original_lang = data.language;
									}
								});
								appending += "<div class='entry'><h2 class='entrytitle'>" + response[i].title + "</h2><p class='entryauthor'>Translated into "+response[i].language+" by " + response[i].author_name + "</p><hr class='entryline'>" + respText +"<p class='entryinfo'>From " + original_lang + " by " + original_author + "</div>";
								}
							}
							document.getElementById("entries").innerHTML = appending;
						});
					}
				});
			});
		})
		$(function() {
			$.getJSON(baseurl + "/authors", function(data){
				availableTags = data;
				$( "#author" ).autocomplete({
					source: availableTags
				});
				$("#author").keypress(function(e){
					if(e.which == 13){
						var search = $("#author").val();
						document.getElementById("contenttitle").innerHTML = "Search Results for " + search;
						$.getJSON(baseurl + "/search?author=" + search, function(response){
							var appending = "";
							for(var i = 0; i < response.length; i++){
								var respText = "";
								$.ajax({
									url: baseurl + "/article/"+response[i].id,
									async: false,
									dataType: 'json',
									success: function(data){
										respText = data.text;
									}
								});
								if(response[i].is_translation == "0"){
								appending += "<div class='entry'><h2 class='entrytitle'>" + response[i].title + "</h2><p class='entryauthor'>Original work by " + response[i].author_name + "</p><hr class='entryline'>" + respText + "</div>";
								}
								else{
								var orginal_author = "";
								var original_lang = "";
								$.ajax({
									url: baseurl + "/article/" + response[i].parent_id,
									async:false,
									dataType: 'json',
									success: function(data){
										original_author = data.author_name;
										original_lang = data.language;
									}
								});
								appending += "<div class='entry'><h2 class='entrytitle'>" + response[i].title + "</h2><p class='entryauthor'>Translated into "+response[i].language+" by " + response[i].author_name + "</p><hr class='entryline'>" + respText +"<p class='entryinfo'>From " + original_lang + " by " + original_author + "</div>";
								}
							}
							document.getElementById("entries").innerHTML = appending;
						});
					}
				});
			});
		})
		$(function() {
				$("#title").keypress(function(e){
					if(e.which == 13){
						var search = $("#title").val();
						document.getElementById("contenttitle").innerHTML = "Search Results for " + search;
						$.getJSON(baseurl + "/search?title=" + search, function(response){
							var appending = "";
							for(var i = 0; i < response.length; i++){
								var respText = "";
								$.ajax({
									url: baseurl + "/article/"+response[i].id,
									async: false,
									dataType: 'json',
									success: function(data){
										respText = data.text;
									}
								});
								if(response[i].is_translation == "0"){
								appending += "<div class='entry'><h2 class='entrytitle'>" + response[i].title + "</h2><p class='entryauthor'>Original work by " + response[i].author_name + "</p><hr class='entryline'>" + respText + "</div>";
								}
								else{
								var orginal_author = "";
								var original_lang = "";
								$.ajax({
									url: baseurl + "/article/" + response[i].parent_id,
									async:false,
									dataType: 'json',
									success: function(data){
										original_author = data.author_name;
										original_lang = data.language;
									}
								});
								appending += "<div class='entry'><h2 class='entrytitle'>" + response[i].title + "</h2><p class='entryauthor'>Translated into "+response[i].language+" by " + response[i].author_name + "</p><hr class='entryline'>" + respText +"<p class='entryauthor'>From " + original_lang + " by " + original_author + "</div>";
								}
							}
							document.getElementById("entries").innerHTML = appending;
						});
					}
				});
			});