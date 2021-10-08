ATA.Modules.Messages = {};

ATA.Modules.Messages.Check = function() {
	ATA.PostDataProtocole("modules/messages");
};

ATA.Modules.Messages.MessageList = async function() {
	ATA.PostDataProtocole("modules/messages",{F:"LIST"});
};


ATA.Setups.push(function(){
	ATA.Modules.Messages.Messages = 0;
	setTimeout("ATA.Modules.Messages.Check();",0);
});
ATA.Loops.push(function(){
	$("#messages_module_number").html(ATA.Modules.Messages.Messages);
});


















	
	DHTMLSuite.include("common");
	DHTMLSuite.include("calendar");
	var date = new Date();
	var myCalendarModel5 = new DHTMLSuite.calendarModel({ initialYear:date.getYear(),initialMonth:date.getMonth(),initialDay:1 });
	myCalendarModel5.addInvalidDateRange(false,{year: 2010,month:12,day:31});
	myCalendarModel5.addInvalidDateRange({year: 2025,month:1,day:1},false);
	myCalendarModel5.setLanguageCode('en');
	
	
	
	
	
	
	var myCalendar0 = new DHTMLSuite.calendar({ id:'calendar0',displayCloseButton:false,numberOfRowsInYearDropDown:12 } );
	myCalendar0.setCalendarModelReference(myCalendarModel5);
	myCalendar0.setTargetReference('calendarDiv0');
	myCalendar0.display();
	/*
	var myCalendar1 = new DHTMLSuite.calendar({ id:'calendar1',displayCloseButton:false,numberOfRowsInYearDropDown:12 } );
	myCalendar1.setCalendarModelReference(myCalendarModel5);
	myCalendar1.setTargetReference('calendarDiv1');
	myCalendar1.display();
	
	var myCalendar2 = new DHTMLSuite.calendar({ id:'calendar2',displayCloseButton:false,numberOfRowsInYearDropDown:12 } );
	myCalendar2.setCalendarModelReference(myCalendarModel5);
	myCalendar2.setTargetReference('calendarDiv2');
	myCalendar2.display();
	
	
	
	
	var myCalendar5 = new DHTMLSuite.calendar({ id:'calendar4',displayCloseButton:false,numberOfRowsInYearDropDown:12 } );
	myCalendar5.setCalendarModelReference(myCalendarModel5);
	myCalendar5.setTargetReference('calendarDiv4');
	myCalendar5.display();*/