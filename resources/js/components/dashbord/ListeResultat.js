import React, { Component, Fragment } from 'react'
import ReactDOM from 'react-dom';
import axios from 'axios';








export class ListeResultat extends Component {

    constructor(props) {
        super(props)
        this.state = {
            listeResultat: [],
            tabNatureAnalyse: [],
            categorie: [],
        }
    }

    componentDidMount() {
        axios.get('http://localhost:8000/api/liste_resultat')
            .then((response) => {
                var data = response.data
                var categorie = data.categorie
                var dataFliter = _.uniqBy(categorie, function (x) { return x.id && x.libelle_categorie })
                console.log(data)
                this.setState({
                    listeResultat: data,
                })
            })
    }


    renderRows() {
        if (this.state.listeResultat.length > 0) {

            return this.state.listeResultat.map((data, index) => {
                var dataFliter = _.uniqBy(data.categorie, function (x) { return x.id && x.libelle_categorie })
                return <tr key={index}>
                    <th>{index}</th>
                    <td>{data.code}</td>
                    <td>
                        <table>
                            {dataFliter.map((item, i) => {
                                var lien = `/recu_resultat/${data.id}/${data.code}/${item.id}`
                                return <tr key={i}>
                                    <td  >{item.libelle_categorie}</td>
                                    <td> <a href={lien} target="_blank" className="btn btn-info shadow btn-xs sharp mr-1"><i className="fa fa-print"></i></a> </td>
                                </tr>
                            })}
                        </table>
                    </td>
                    <td>
                        {data.patient.nom_patient+ ' '+data.patient.prenom_patient}
                    </td>

                </tr>
            })

        }


    }






    render() {
        return (
            <Fragment>
                <div className="col-lg-12">
                    <div className="card">
                        <div className="card-header">
                            <h4 className="card-title">Liste des Resultas Analyses</h4>
                        </div>
                        <div className="card-body">
                            <div className="table-responsive">
                                <table className="table header-border table-hover verticle-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Analyse</th>
                                            <th scope="col">Patient</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {this.renderRows()}


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                {/* <div className="col-12">
                    <div className="card">
                        <div className="card-header">
                            <h4 className="card-title">Datatable</h4>
                        </div>
                        <div className="card-body">
                            <div className="table-responsive">
                                <table id="example2" className="display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Analyse</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {this.renderRows()}
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div> */}

            </Fragment>









        )
    }
}

export default ListeResultat

if (document.getElementById('listeDesresultats')) {
    ReactDOM.render(<ListeResultat />, document.getElementById('listeDesresultats'));
}

