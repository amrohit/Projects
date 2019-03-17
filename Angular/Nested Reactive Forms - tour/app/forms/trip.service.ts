import { Trip } from "./nested-form-model/trip.model";
import { Injectable } from "@angular/core";

@Injectable({
  providedIn: "root"
})
export class TripService {
  trips: Trip[] = [
    {
      name: "Gaya",
      cities: [
        {
          name: "BodhGaya",
          places: [
            {
              name: "Buddha Temple"
            },
            {
              name: "Snake Temple"
            }
          ]
        }
      ]
    },
    {
      name: "Gaya",
      cities: [
        {
          name: "BodhGaya",
          places: [
            {
              name: "Buddha Temple"
            },
            {
              name: "Snake Temple"
            }
          ]
        }
      ]
    }
  ];
  constructor() {}
  fnGetTrips() {
    return [...this.trips];
  }
  fnGetTrip() {
    const index = [0, 1];
    return this.trips[Math.floor(Math.random() * index.length)];
  }
  fnSaveTrips(trip: Trip) {
    this.trips.push(trip);
  }
}
