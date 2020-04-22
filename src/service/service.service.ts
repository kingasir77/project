import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class Services {
  url ='http://localhost/project_2/api/api.php/'
  location: any;

  constructor(private http: HttpClient) { 
    
   }
   
   get_companies() {
     return this.http.get( this.url + 'company/get_companies') ;
   }
   get_companiesByID(id) {
     return this.http.get( this.url + 'company/get_company?id=' + id) ;
   }
   get_offices(id){
     return this.http.get( this.url +'office/get_offices?id=' +id);
   }
   
   
   get_plans(id){
    return this.http.get( this.url +'plan/get_plans?id=' +id);
  }
  
  get_plan(id){
    return this.http.get(this.url +'plan/get_plan?id='+id);
  }
  
  get_hospitals(id){
    return this.http.get(this.url +'hospital/get_hospitals/'+id);
  }
  
  get_hospital(id){
    return this.http.get(this.url +'hospital/get_info/'+id);
  }
  
  get_specialty(id){
    return this.http.get(this.url +'specialty/get_names?id='+id);
  }
  
  list_hospitals(){
    return this.http.get(this.url + 'hospital/list_hospitals' );
  }
  
  goBack() {
    this.location.back();
  } 
}
