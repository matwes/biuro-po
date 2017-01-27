package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class DodawanieUsUgiHotelowej {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://localhost:1234/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testDodawanieUsUgiHotelowej() throws Exception {
    driver.get(baseUrl + "/biuro-po/index.html");
    driver.findElement(By.xpath("//button[@onclick=\"location.href = 'wspolpracownicy.php'\"]")).click();
    driver.findElement(By.linkText("LOT")).click();
    driver.findElement(By.id("noclegBtn")).click();
    new Select(driver.findElement(By.id("ctrSelect"))).selectByVisibleText("Niemcy");
    driver.findElement(By.cssSelector("option[value=\"2\"]")).click();
    driver.findElement(By.id("star4")).click();
    new Select(driver.findElement(By.id("ctySelect"))).selectByVisibleText("Hanburg");
    driver.findElement(By.id("btn")).click();
    assertEquals("Niemcy - Hanburg - 4 gwiazdki", driver.findElement(By.cssSelector("td")).getText());
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
