import { Component } from '@angular/core';
import { Services } from '../../service/service.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-tab2',
  templateUrl: 'tab2.page.html',
  styleUrls: ['tab2.page.scss']
})
export class Tab2Page  {
  hospitals: any;
  constructor(private rout: ActivatedRoute, private service: Services) {}
  
  async ngOnInit() {
 
    
    await this.service.list_hospitals().toPromise().then( (data: any) => {
      console.log(data);
      this.hospitals = data ;
    } )
    

  }

}
