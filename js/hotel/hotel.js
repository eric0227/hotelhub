$(function(){
		$('.date_input').datepicker();
		SetUIActivity();
});

var hotel = {
	baseUrl:null,
	id_country:null,
	id_destination:null,
	countryObject:null,
	destinationObject:null,
	
	setBaseUrl: function(baseUrl) {
		this.baseUrl = baseUrl;
	},
	
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
	
	displayDestinationList: function(id_country, callback){
		data = "<option value=''>Destination</option>";
		hotel.destinationObject.html(data);
		
		if(id_country) {
			$.post(
				this.baseUrl + '/destination/ajaxList',
				{'id_country':id_country},
				function(data){
					data = "<option value=''>Destination</option>" + data;
					hotel.destinationObject.html(data);
					hotel.id_destination = hotel.destinationObject.val();
					if(hotel.id_destination == ''){ hotel.id_destination = 0; }
					if(callback) {
						callback();
					}
				}
			);
		}
		
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

function SetUIActivity(){
	$('.select_btn_group .select_btn').live('click', function(){
		var list = $(this).parent().find('ul');
		var flag = list.css('display');
		
		if(flag == 'none'){ list.css('display', 'block'); $(this).addClass('selected'); }
		if(flag == 'block'){ list.css('display', 'none'); $(this).removeClass('selected'); }
	});
}