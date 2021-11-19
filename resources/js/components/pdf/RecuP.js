import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import axios from 'axios';


export class RecuP extends Component {

    constructor(props) {
        super(props);
        this.state = {
            tousAnalyse: [],
            montant: '',
            nature: [],
            patient: [],
            code: '',
            dateJour: ''
        }
    }


    dateParse = (dateP) => {
        let newDate = new Date(dateP).toLocaleDateString('fr-FR', {
            month: "short",
            year: "numeric",
            day: "numeric",
            hour: "2-digit"
        })
        return newDate
    }











    componentDidMount() {


        axios.get('http://localhost:8000/get_user')
            .then((response) => {
                var data = response.data[0]
                this.setState({
                    nomUser: data.nom_user,
                    prenomUser: data.prenom_user,
                })
            })



        axios.post('http://localhost:8000/api/analyse_user', {
            "code": this.state.code
        }).then((response) => {
            console.log(response.data[0])
            var code = response.data[0].code
            var date = response.data[0].created_at
            var data = response.data[0].categorie
            date = this.dateParse(date)
            var nature = response.data[0].nature_analyse
            var montant = response.data[0].montant
            var patient = response.data[0].patient
            // var dataFliter = [...new Set(data.map(item => item.id && item.libelle_categorie))]
            var dataFliter = _.uniqBy(data, function (x) { return x.id && x.libelle_categorie })
            // console.log('filter')
            // console.log(dataFliter)
            this.setState({
                tousAnalyse: dataFliter,
                montant: montant,
                nature: nature,
                patient: patient,
                code: code,
                dateJour: date
            })

        })
    }



















    render() {
        return (
            <div>
                <div>
                    <h4>Liste des analyses du patient </h4>
                </div>

                {
                    this.state.tousAnalyse.map((data, index) => {
                        return <div className="col-md-12" key={index}>
                            <ul className="list-group">
                                <li className="list-group-item" aria-current="true">Categorie Analyse : {data.libelle_categorie}</li>
                                <li className="list-group-item"> Nom & Prénoms : {this.state.patient.nom_patient + " "} {" " + this.state.patient.prenom_patient}</li>
                                <li className="list-group-item">
                                    <table >
                                        <tr key={index}> Analyses :</tr>
                                        {this.state.nature.map((item, i) => {
                                            if (item.categorie_id == data.id) {
                                                return <tr key={item.id}>
                                                    <td > {item.libelle_analyse}</td>
                                                </tr>
                                            }
                                        })}
                                    </table>
                                </li>
                            </ul>
                            <br />
                            <hr />
                        </div>
                    })

                }
                <div>
                    {/* <button className="btn btn-primary" onClick={this.generatePDF}>IMPRIMER</button> */}
                    <button id="print" className="btn btn-primary" onClick={window.print}>IMPRIMER</button>

                </div>
            </div>
        )
    }
}

export default RecuP

if (document.getElementById('premierrecu')) {
    ReactDOM.render(<RecuP />, document.getElementById('premierrecu'));
}