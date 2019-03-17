import { TripService } from "./../trip.service";
import { Component, OnInit } from "@angular/core";
import { FormGroup, FormArray, FormControl } from "@angular/forms";

@Component({
  selector: "app-nested-form",
  templateUrl: "./nested-form.component.html",
  styleUrls: ["./nested-form.component.css"]
})
export class NestedFormComponent implements OnInit {
  tripForm: FormGroup;
  isEditMode: boolean = false;

  constructor(private tripService: TripService) {}

  ngOnInit() {
    this.fnGetTrip();
  }
  fnModAncTag() {
    if (this.isEditMode) {
      return "Create New Trip";
    } else {
      return "Edit Trip";
    }
  }

  fnAddCity() {
    return new FormGroup({
      name: new FormControl(null),
      places: new FormArray([this.fnAddPlace()])
    });
  }
  fnAddPlace() {
    return new FormGroup({
      name: new FormControl(null)
    });
  }
  fnOnFormSave() {
    console.log(this.tripForm);
    this.tripService.fnSaveTrips(this.tripForm.value);
  }

  fnGetCity() {
    return (this.tripForm.get("cities") as FormArray).controls;
  }
  fnGetPlace(city) {
    return (city.get("places") as FormArray).controls;
  }

  fnOnAddCity() {
    (this.tripForm.get("cities") as FormArray).push(this.fnAddCity());
  }
  fnOnAddPlace(city) {
    (city.get("places") as FormArray).push(this.fnAddPlace());
  }

  fnGetTrip() {
    let tripName = "";
    let cities: FormArray;
    this.isEditMode = !this.isEditMode;
    const formData = this.tripService.fnGetTrip();
    if (this.isEditMode) {
      cities = new FormArray([]);
      let places = new FormArray([]);
      tripName = formData.name;
      for (let city of formData.cities) {
        for (let place of city.places) {
          places.push(
            new FormGroup({
              name: new FormControl(place.name)
            })
          );
        }
        cities.push(
          new FormGroup({
            name: new FormControl(city.name),
            places: places
          })
        );
      }
    } else {
      cities = new FormArray([this.fnAddCity()]);
    }
    this.tripForm = new FormGroup({
      name: new FormControl(tripName),
      cities: cities
    });
  }
}
