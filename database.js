const RouteDB = (() => {
  const KEY = "routedesk_v10_import";
  function load(){
    try{
      let s=JSON.parse(localStorage.getItem(KEY)||'{"drivers":[],"companies":[]}');
      if(Array.isArray(s)) s={drivers:s,companies:[]};
      return {drivers:Array.isArray(s.drivers)?s.drivers:[],companies:Array.isArray(s.companies)?s.companies:[]};
    }catch(e){return {drivers:[],companies:[]};}
  }
  function save(db){localStorage.setItem(KEY,JSON.stringify(db));}
  return {KEY,load,save};
})();
