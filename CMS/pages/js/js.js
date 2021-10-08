/*

ATA.JS V3.0 System Core

*/

var ATA = {};

// Settings
ATA.loopTime = 1000;
ATA.startTime = new Date();
ATA.id = "X" + Math.random();

// Modules
ATA.Modules = {};

ATA.checkSystem = function() { // Check system
	this.loop();
	setTimeout(function(){ATA.checkSystem();},this.loopTime);
};

ATA.Setups = [];
ATA.setup = function() { // Setup function
	for (var i=0;i<this.Setups.length;i++) {
		try {
			this.Setups[i]();
		} catch (e) {
			
		}
	}
	this.Setups = [];
	this.checkSystem();
};

ATA.Loops = [];
ATA.loop = function() {
	var newdate = (new Date());
	for (var i=0;i<this.Loops.length;i++) this.Loops[i](newdate);
};

ATA.Flags = null;
ATA.PostResponseMessage = function(data) {
	if (data.TargetID != this.id) return;
	if (data.Error) console.log(data.Error);
	if (data.Flags) this.Flags = data.Flags;
	if (data.Code) setTimeout(data.Code,0);
};

ATA.PostDataProtocole = function(task,data) {
	var data = Object.assign({}, data);
	data.date = (new Date()).getTime();
	data.TargetID = this.id;
	this.PostData("/api/"+task,data);
};

ATA.Login = function(EMail,Password) {
	var data = {EMail:EMail,Password:Password};
	data.date = (new Date()).getTime();
	data.TargetID = this.id;
	data._WHO = "1";
	data[this.clientside.SessionName] = 1;
	this.PostData("/",data);
};

ATA.Logout = function() {
	var data = {};
	data.date = (new Date()).getTime();
	data.TargetID = this.id;
	data._WHO = "-1";
	data[this.clientside.SessionName] = 1;
	this.PostData("/",data);
};

ATA.GoURL = function(oUrl) {
	$(location).attr('href',oUrl);
};

ATA.PostData = function(oUrl,data) {
	var sendData = {};
	sendData.type = "POST";
	sendData.url = ""+oUrl+"";
	sendData.data = data;
	sendData.success = function(Data) {
		ATA.PostResponseMessage(JSON.parse(Data));
	};
	$.ajax(sendData);
};

ATA.ReadHttpData = async function(oUrl,data) {
	var rdata;
	var data = data?data:{};
	data.RUNTIME = "1";
	data.TargetID = this.id;
	var promise = new Promise(function(resolve, reject) {
		var sendData = {};
		sendData.type = "POST";
		sendData.url = ""+oUrl+"";
		sendData.data = data;
		sendData.success = function(Data) {
			rdata = JSON.parse(Data);
			ATA.PostResponseMessage(rdata);
			resolve();
		};
		$.ajax(sendData);
	}).then(function() {
		return rdata;
	});
	promise = await promise;
	return promise;
};

ATA.GetData = function(oUrl,data) {
	$.get(oUrl,data,function(Data) {
		ATA.PostResponseMessage(JSON.parse(Data));
	});
};

ATA.ReadCookie = function(cookie, value) {
	var name = this.sessionName + "_" + cookie + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
	}
	this.WriteCookie(cookie, value);
	return value;
}

ATA.WriteCookie = function(cookie, value) {
	var d = new Date();
	d.setTime(d.getTime() + (24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = this.sessionName + "_" + cookie + "=" + value + ";" + expires + ";path=/";
};

ATA.Setups.push(function() {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
		$('#body').toggleClass('active');
	});
	
	$("Form").submit(function(e) {
		e.preventDefault();
		var form = $(this);
		ATA.PostData(form.attr('action'),form.serialize());
	});
	
	$("a.postlink").click(function(e){
		e.preventDefault();
		ATA.GetData($(this).attr('href'));
		return false;
	});
	
	var trafficchart = document.getElementById("trafficflow");
	var saleschart = document.getElementById("sales");

	var myChart1 = new Chart(trafficchart, {
		type: 'line',
		data: {
				labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
				datasets: [{
					backgroundColor: "rgba(48, 164, 255, 0.5)",
					borderColor: "rgba(48, 164, 255, 0.8)",
					data: ['1135', '1135', '1140','1168', '1150', '1145','1155', '1155', '1150','1160', '1185', '1190'],
					label: 'Traffic',
					fill: true
				}]
		},
		options: {
			responsive: true,
			title: {display: false,text: 'Chart'},
			legend: {position: 'top',display: false,},
			tooltips: {mode: 'index',intersect: false,},
			hover: {mode: 'nearest',intersect: true},
			scales: {
				xAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Months'
					}
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Number of Visitors'
					}
				}]
			}
		}
		});
});

ATA.waitUntil = async function(if_, eval_) {
	var promise = new Promise(function(resolve, reject) {
		var f_temp = function() {
			if (eval(if_)) {
				delete f_temp;
				resolve();
			} else {
				setTimeout(f_temp,25);
			}
		};
		f_temp();
	}).then(function() {
		return eval_;
	});
	promise = await promise;
	return promise;
};

ATA.modalWindow_flag = false;
ATA.modalWindow_result = "OK";
ATA.modalWindow_setresult = function(result) {
	$("#modalwindow").modal("hide");
	this.modalWindow_result = result;
	this.modalWindow_flag = true;
};
ATA.modalWindow = async function(title, body, opts) {
	this.modalWindow_flag = false;
	$("#modalwindow").modal("show");
	/*$("#modalwindow").draggable({
		cancel:"modal-body"
	});*/
	$("#modalwindow .modal-title").html(title);
	$("#modalwindow .modal-body").html(body);
	if (opts) {
		if (opts.SPc) {
			$("#modalwindow .modal-footer").hide();
			var body = "";
			for (var i=0;i<opts.SPc.length;i++) body += "<button class=\"btn btn-primary\" onclick=\"ATA.modalWindow_setresult('"+opts.SPc[i]+"');\">"+opts.SPc[i]+"</button>&nbsp;";
			$("#modalwindow .modal-body").html("<center>"+body+"</center>");
		} else $("#modalwindow .modal-footer").show();
		if (body.length == 0) $("#modalwindow .modal-body").hide();
		else $("#modalwindow .modal-body").show();
		if (opts.NO) $("#modalwindow #modalWindow_NOButton").show();
		else $("#modalwindow #modalWindow_NOButton").hide();
		if (opts.YES) $("#modalwindow #modalWindow_YESButton").show();
		else $("#modalwindow #modalWindow_YESButton").hide();
		if (opts.OK) $("#modalwindow #modalWindow_OKButton").show();
		else $("#modalwindow #modalWindow_OKButton").hide();
		if (opts.Close) {
			$("#modalwindow #modalWindow_CloseButton").show();
			$("#modalwindow .close").show();
		} else {
			$("#modalwindow #modalWindow_CloseButton").hide();
			$("#modalwindow .close").hide();
		}

	}
	await this.waitUntil("ATA.modalWindow_flag","ATA.modalWindow_flag = false;");
	return this.modalWindow_result;
};

ATA.Delay = async function(time) { // this should be used with "await"
	var promise = new Promise(function(resolve, reject) {
		setTimeout(function() {
			resolve();
		}, time);
	}).then(function() {
		return true;
	});
	promise = await promise;
	return promise;
};

ATA.addDatatoChart = function(chart, title, data) {
	chart.data.labels.push(title);
	chart.data.datasets[0].data.push(data);
	chart.update();
};

/*
	options.options = {};
	options.options.responsive = true;
	options.options.title = {display: false, text: 'Chart'};
	options.options.tooltips = {mode: 'index', intersect: false};
	options.options.hover = {mode: 'nearest', intersect: true};
	options.options.scales = {};
	options.options.scales["yAxes"] = [{
		display: true,
		scaleLabel: {
			display: true,
			labelString: 'Y-Direction'
		}
	}];
	options.options.scales["xAxes"] = [{
		display: true,
		scaleLabel: {
			display: true,
			labelString: 'X-Direction'
		}
	}];
	options.type = "line";
	options.data = {};
	options.data.labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
	options.data.datasets = [];
	options.data.datasets.push({
		backgroundColor: "rgba(48, 164, 255, 0.5)",
		borderColor: "rgba(48, 164, 255, 1)",
		data: ['1.5', '1.2','1.15', '2','2.7', '3', '3.5','3.8', '4', '4.4', "4.8", "5.27"],
		label: '',
		fill: true
	});
	var myChart1 = new Chart(chart1, options);
};

*/