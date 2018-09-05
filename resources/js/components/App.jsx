import React, { Component } from 'react';
import axios from "axios";
import City from "./City";
import CompareTable from "./CompareTable";

const cities = [
    {
        "id": 2643743,
        "city": "London",
        "img": "//www.cayuga-cc.edu/academics/wp-content/uploads/sites/9/2016/01/london-preview.jpg",
    }, {
        "id": 2950159,
        "city": "Berlin",
        "img": "//berlin-audiovisuell.de/wp-content/uploads/2014/02/dom-9144.jpg",
    }, {
        "id": 2988507,
        "city": "Paris",
        "img": "//www.puredestinations.co.uk/wp-content/uploads/2014/07/Hotel-Prince-De-Galles-Paris-Paris-City-Breaks-thumbnail.jpg",
    }, {
        "id": 703448,
        "city": "Kiev",
        "img": "//scontent.cdninstagram.com/vp/597c844b627c3ea604adbcf1cd70678d/5C135CFF/t51.2885-15/sh0.08/e35/s640x640/37773544_278633426233668_3004819799579557888_n.jpg",
    }, {
        "id": 2759794,
        "city": "Amsterdam",
        "img": "//www.klm.com/travel/en/images/2F50FB2D-2291-4DF0-9999-1280F7947ABA_tcm493-506321_456x456_80.jpg",
    }
];

export default class App extends Component {
    constructor(props) {
        super(props);

        this.state = {
            compares: [],
        };

        this.handleClick = this.handleClick.bind(this);
    }

    async handleClick() {
        try {
            const options = cities.map(city =>  `cities[][id]=${city.id}`).join('&');
            const { data : compares } = await axios(`/api/compare?${options}`);

            this.setState({ compares });
        } catch (error) {
            console.error(error);
        }
    }

    render() {
        const { compares } = this.state;

        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Weather app</div>

                            <div className="card-body">
                                {
                                    cities.map(city => <City key={city.id} name={city.city} image={city.img} />)
                                }
                                <button className="btn btn-block" onClick={this.handleClick}>Compare cities</button>
                                {
                                    compares.length > 0 &&
                                    <CompareTable cities={compares} />
                                }
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
