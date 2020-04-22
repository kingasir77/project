import { Component, OnInit } from "@angular/core";
import { Services } from 'src/service/service.service';

@Component({
  selector: "app-tab1",
  templateUrl: "tab1.page.html",
  styleUrls: ["tab1.page.scss"]
})
export class Tab1Page implements OnInit {
  companies: any = [];
  constructor(private service: Services) {}
  async ngOnInit() {
    await this.service
      .get_companies()
      .toPromise()
      .then((res: any) => {
        console.log(res);
        this.companies = res ;
        
      });
  }
}
