import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Services } from 'src/service/service.service';
import { Location } from '@angular/common';



@Component({
  selector: 'app-plan',
  templateUrl: './plan.page.html',
  styleUrls: ['./plan.page.scss'],
})
export class PlanPage implements OnInit {
  
  id: any;
  plan: any ={};
  hospital: any ;

  constructor(private rout: ActivatedRoute, private service: Services ,private location: Location) { }

  async ngOnInit() {
    await this.rout.paramMap.subscribe( (id: any) => {
      console.log(id);
      this.id = id.params.id
    })
    
    await this.service.get_plan(this.id).toPromise().then( (data: any) => {
      console.log(data);
      this.plan = data ;
    } )
    
    await this.service.get_hospitals(this.id).toPromise().then( (data: any) => {
      console.log(data);
      this.hospital = data ;
    } )
    
  
  
  }

}
