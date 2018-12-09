package com.main.project.projectx;

import org.junit.Test;

import static org.junit.Assert.assertFalse;
import static org.junit.Assert.assertTrue;

public class LoginActivityPasswordTest {

    @Test
    public void correctLength() {
        String password = "meow";
        assertFalse(LoginActivity.isPasswordValid(password));
    }

    @Test
    public void hasCapitalLetter() {
        String password = "Kiscica123";
        assertTrue(LoginActivity.isPasswordValid(password));
    }

    @Test
    public void hasNumber() {
        String password = "Kamujelszo123";
        assertTrue(LoginActivity.isPasswordValid(password));

    }

    @Test
    public void hasLowerLetter() {
        String password = "SSSS123";
        assertFalse(LoginActivity.isPasswordValid(password));
    }

    @Test
    public void notEmpty() {
        String password = "";
        assertFalse(LoginActivity.isPasswordValid(password));
    }
    @Test
    public void noWhiteSpaces() {
        String password = "Kiscica123 ";
        assertFalse(LoginActivity.isPasswordValid(password));
    }

}
