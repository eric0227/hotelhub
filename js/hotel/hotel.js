$(function(){
		$('.date_input').datepicker();
});

var hotel = {
	id_country:null,
	id_destination:null,
	countryObject:null,
	destinationObject:null,
	
	combine: function(country, destination){
		this.countryObject = $(country);
		this.destinationObject = $(destination);

		this.countryObject.live("change", function(event){
			hotel.id_country = $(this).val();
			hotel.displayDestinationList(hotel.id_country);
		});
		
		this.destinationObject.live("change", function(){
			hotel.id_destination = $(this).val();
		});
		
		return this;
	},
	
	displayDestinationList: function(id_country){
		$.post(
			'destination/ajaxList',
			{'id_country':id_country},
			function(data){
				hotel.destinationObject.html(data);
				hotel.id_destination = hotel.destinationObject.val();
				if(id_destination == ''){ hotel.id_destination = 0; }
			}
		);
		
		return this;
	},
	
	submit: function(){
		var flag = true;
		
		if(hotel.id_country == null || hotel.id_destination == null){ flag = false; }
		if(!flag){
			alert('Please choose country and destination you want to find.');
			return false;
		}
		
		return true;
	}
};