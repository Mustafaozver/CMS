ATA.Modules.Finance = {};
ATA.Modules.Finance.Currency = "";
ATA.Modules.Finance.CurrencySign = "";
ATA.Modules.Finance.Currencies = {};
ATA.Modules.Finance.Assets = {};
ATA.Modules.Finance.UIAnimations = {};

ATA.Modules.Finance.Check = function() {
	ATA.PostDataProtocole("modules/finance",{F:""});
	for (var key in this.Currencies) {
		ATA.PostDataProtocole("modules/finance",{F:"CURRENCY",CURR:key});
		ATA.PostDataProtocole("modules/finance",{F:"ASSET",CURR:key});
	}
	ATA.PostDataProtocole("modules/finance",{F:"CHECK"});
};

ATA.Modules.Finance.Check2 = function() {
	ATA.PostDataProtocole("modules/finance",{F:"CURRENCYALL",CURR:Object.keys(ATA.Modules.Finance.Currencies).join(",")});
	return;
	//var currenciesdata = await ATA.ReadHttpData("https://api.exchangeratesapi.io/latest?base=" + this.Currency,{});
	//console.log(currenciesdata);
};

ATA.Modules.Finance.GetTotalAssets = function() {
	var total = 0;
	for (var key in this.Currencies) total += this.GetAssetByCurrency(key);
	return total.toFixed(0);
};

ATA.Modules.Finance.GetAssetByCurrency = function(curr) {
	return this.Assets[curr]*this.Currencies[curr]/this.Currencies[this.Currency];
};

ATA.Modules.Finance.UIAnimations.Cycle = function(i) {
	var currencies = Object.keys(ATA.Modules.Finance.Currencies);
	if (i < currencies.length*2) {
		if (i%2 == 0) $("#finance_module_notification").html("" + currencies[i/2] + "/" + ATA.Modules.Finance.Currency + " = " + (ATA.Modules.Finance.Currencies[currencies[i/2]]/ATA.Modules.Finance.Currencies[ATA.Modules.Finance.Currency]));
		else  $("#finance_module_notification").html("Assets : " + (ATA.Modules.Finance.Assets[currencies[(i-1)/2]])+" "+ATA.Modules.Finance.Currency+"");
	} else i = 0;
	setTimeout("ATA.Modules.Finance.UIAnimations.Cycle("+(i++)+");",1000);
};

ATA.Setups.push(function(){
	setTimeout("ATA.Modules.Finance.Check();ATA.Modules.Finance.Check2();ATA.Modules.Finance.UIAnimations.Cycle(0);",0);
});

ATA.Loops.push(function(){
	$("#finance_module_number").html(ATA.Modules.Finance.GetTotalAssets() + ATA.Modules.Finance.CurrencySign);
});