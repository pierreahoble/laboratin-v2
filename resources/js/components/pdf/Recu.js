import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import jsPDF from 'jspdf'
import axios from 'axios';




class Recu extends Component {
    constructor(props) {
        super(props)
        this.state = {
            nomUser: '',
            code: '',
            montant: '',
            tousAnalyse: [],
            dateJour: '',
            nature: [],
            patient: [],
            nomUser:'',
            prenomUser:'',


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
                <div id="pdfrecu">

                    <div id="main">
                        <div className="grille">
                            <img src="https://cdn.1min30.com/wp-content/uploads/2018/05/Logo-Pharmacie.jpg" alt="" />
                            <h5>MINISTERE DE LA SANTE ET DE L'HYGIENE PUBLIQUE</h5>
                            <p>
                                Reçu N° {this.state.code} du {this.state.dateJour}
                            </p>
                            <h6>HOPITAL DE BE</h6>
                        </div>

                        <div className="grille">
                            <img src="https://cdn.1min30.com/wp-content/uploads/2018/05/Logo-Pharmacie.jpg" alt="" />

                            <h5>MINISTERE DE LA SANTE ET DE L'HYGIENE PUBLIQUE</h5>
                            <p>
                                Reçu N° {this.state.code} du {this.state.dateJour}
                            </p>
                            <h6>HOPITAL DE BE</h6>
                        </div>
                    </div>



                    <div id="main2">

                        <div className="grille">

                            <div id="text">
                                <div className="grille">
                                    <p>Reçu  Client  </p>
                                </div>
                                <div className="grille">
                                    <p>Caissier : {this.state.nomUser+ ' ' + this.state.prenomUser}</p>
                                </div>
                            </div>


                            <table id="tableInfo">

                                <tbody>
                                    <tr>
                                        <td colSpan="4">CLIENT :{this.state.patient.nom_patient + ' ' + this.state.patient.prenom_patient}(Tel:
                                            9045689)</td>
                                    </tr>
                                    <tr>
                                        <td colSpan="4">INAM /80%/ Sexe F Age : {this.state.patient.age_patient} an (s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colSpan="4">Accompagnant : {this.state.patient.nom_accompagnant_patient}</td>
                                    </tr>
                                    <tr>
                                        <td >Montant EMIS</td>
                                        <td >Montant PEC</td>
                                        <td >Montant PAYE</td>
                                    </tr>
                                    <tr>
                                        <td >{this.state.montant}</td>
                                        <td >5600</td>
                                        <td >{this.state.montant}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <br />

                            <table id="tableInfo" className="tableleft" >
                                <thead>
                                    <th>Prestation</th>
                                    <th>Qte</th>
                                    <th>Prix Unit</th>
                                    <th>Mt Brut</th>
                                    <th>PEC</th>
                                    <th>Mt NAP</th>
                                </thead>
                                <tbody>
                                    {this.state.nature.map((data, index) => {
                                        return <tr key={data.id}>
                                            <th>{data.libelle_analyse}</th>
                                            <th>1</th>
                                            <th>{data.prix_unitaire}</th>
                                            <th>Mt Brut</th>
                                            <th>PEC</th>
                                            <th>Mt NAP</th>
                                        </tr>
                                    })}
                                </tbody>
                            </table>
                            <p>
                                Ce reçu est valable pour 30 jours, Passer ce delai, toute réclammation est irrecevable
                            </p>

                        </div>



                        <div className="grille">

                            <div id="text">
                                <div className="grille">
                                    <p>Reçu  Client  </p>
                                </div>
                                <div className="grille">
                                    <p>Caissier : {this.state.nomUser+ ' ' + this.state.prenomUser}</p>
                                </div>
                            </div>


                            <table id="tableInfo" className="tableInfo">

                                <tbody>
                                    <tr>
                                        <td colSpan="4">CLIENT :{this.state.patient.nom_patient + ' ' + this.state.patient.prenom_patient}(Tel:
                                            9045689)</td>
                                    </tr>
                                    <tr>
                                        <td colSpan="4">INAM /80%/ Sexe F Age : {this.state.patient.age_patient} an (s)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colSpan="4">Accompagnant : {this.state.patient.nom_accompagnant_patient}</td>
                                    </tr>
                                    <tr>
                                        <td >Montant EMIS</td>
                                        <td >Montant PEC</td>
                                        <td >Montant PAYE</td>
                                    </tr>
                                    <tr>
                                        <td >{this.state.montant}</td>
                                        <td >5600</td>
                                        <td >{this.state.montant}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <br />

                            <table id="tableInfo" className="tableInfo">
                                <thead>
                                    <th>Prestation</th>
                                    <th>Qte</th>
                                    <th>Prix Unit</th>
                                    <th>Mt Brut</th>
                                    <th>PEC</th>
                                    <th>Mt NAP</th>
                                </thead>
                                <tbody>
                                    {this.state.nature.map((data, index) => {
                                        return <tr key={data.id}>
                                            <th>{data.libelle_analyse}</th>
                                            <th>1</th>
                                            <th>{data.prix_unitaire}</th>
                                            <th>Mt Brut</th>
                                            <th>PEC</th>
                                            <th>Mt NAP</th>
                                        </tr>
                                    })}
                                </tbody>
                            </table>
                            <p className="tableInfo">
                                Ce reçu est valable pour 30 jours, Passer ce delai, toute réclammation est irrecevable
                            </p>

                        </div>

                    </div>


                </div>
                <div>
                    {/* <button className="btn btn-primary" onClick={this.generatePDF}>IMPRIMER</button> */}
                    <button id="print" className="btn btn-primary" onClick={window.print}>IMPRIMER</button>

                </div>
            </div>
        )
    }
}

export default Recu

if (document.getElementById('analyserecu')) {
    ReactDOM.render(<Recu />, document.getElementById('analyserecu'));
}