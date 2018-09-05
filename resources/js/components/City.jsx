import React, { Component } from 'react';
import PropTypes from 'prop-types';

const City = ({ name, image }) => (
    <div className="city-container">
        <img src={ image } alt={name} />
        <span>{name}</span>
    </div>
);

City.defaultProps = {
    image: "",
};

City.propTypes = {
    name: PropTypes.string.isRequired,
    image: PropTypes.string,
};

export default City;
