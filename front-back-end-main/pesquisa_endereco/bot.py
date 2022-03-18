from logging import captureWarnings
from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
import time

driver = webdriver.Chrome(ChromeDriverManager().install())
time.sleep(1)

driver.get("http://localhost/ajax/app_pesquisa_endereco/") #endereço do site (localhost ou website)
listaCEP = ['01310-200', '13930-000', '13940-000', '13905-529','13050-913']
for i in listaCEP:
    campo_cep = driver.find_element('id', 'cep')
    campo_cep.click()
    campo_cep.clear()
    campo_cep.send_keys(i)
    # clicar fora para ativa o onblur do campo cep
    driver.find_element_by_tag_name('body').click()
    time.sleep(1)
