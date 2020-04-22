import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Services } from 'src/service/service.service';

@Component({
  selector: 'app-plans',
  templateUrl: './plans.page.html',
  styleUrls: ['./plans.page.scss'],
})
export class PlansPage implements OnInit {
  id: any;
  companie: any = {};
  offices: any ;
  plans: any ;

  constructor(private rout: ActivatedRoute, private service: Services) { }

  async ngOnInit() {
    await this.rout.paramMap.subscribe( (id: any) => {
      console.log(id);
      this.id = id.params.id
    })
    
    
    await this.service.get_companiesByID(this.id).toPromise().then( (data: any) => {
      console.log(data);
      this.companie = data ;
    } )
    
    
    await this.service.get_offices(this.id).toPromise().then( (data: any) => {
      console.log(data);
      this.offices = data ;
    } )
   
    await this.service.get_plans(this.id).toPromise().then( (data: any) => {
      console.log(data);
      this.plans = data ;
    } )
    
    
    
    
    
  }
}
