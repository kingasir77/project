import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Services } from 'src/service/service.service';

@Component({
  selector: 'app-hospital',
  templateUrl: './hospital.page.html',
  styleUrls: ['./hospital.page.scss'],
})
export class HospitalPage implements OnInit {
  id :any;
  hospital: any ={};
  specialty: any ;

  constructor(private rout: ActivatedRoute, private service: Services) { }

  async ngOnInit() {
    await this.rout.paramMap.subscribe( (id: any) => {
      console.log(id);
      this.id = id.params.id
    })
    
    await this.service.get_hospital(this.id).toPromise().then( (data: any) => {
      console.log(data);
      this.hospital = data ;
    } )
    
    await this.service.get_specialty(this.id).toPromise().then( (data: any) => {
      console.log(data);
      this.specialty = data ;
    } )
}}