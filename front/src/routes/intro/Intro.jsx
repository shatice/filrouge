import React, { useState }from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

/* Styles */
import './intro.scss';

/***** COMPONENTS *****/
import Header from '../../components/header/Header.jsx';
import Globe from '../../components/globe/Globe.jsx';
 
const Intro = () => {

    const [selected, setSelected] = React.useState( false );

    const handleClick = (e) => {
        
    }

    return(
        <div className="intro">
            <Header/>
            <section className="intro__content">
                <h1>Our Plastic World</h1>
                <p>La production de matières plastiques ne cesse d’augmenter depuis 1950, elle fait partie de notre quotidien. Le plastique est solide et recyclable, pourtant il représente X% de la pollution mondiale...</p>
                <Link to="/main"><button className="cta">C'est parti</button></Link>
            </section>
            <Globe/>
        </div>
    );
}
   
export default Intro;