using System;

namespace CSharp
{
    class Program
    {
        static void Main(string[] args)
        {

            Console.WriteLine("Tópico 1");

            //Variaveis
            int indice = 13;
            int soma = 0;
            int k = 0;

            while (k < indice)
            {
                k++;
                soma += k;
            }

            //Exibe o resultado
            Console.WriteLine("Resultado");
            Console.WriteLine("Indice: " + indice);
            Console.WriteLine("Soma: " + soma);

            // Tópico 2
            Console.WriteLine("Tópico 2");

            // Sequencia de Fibonacci
            int numero = 34;
            int anterior = 0;
            int atual = 1;
            int proximo = 0;
            string lista = "";
            string resultado = "";

            if (args.Length > 0)
            {
                int.TryParse(args[0], out numero);
            }

            while (anterior < numero)
            {
                lista += anterior + ";";
                proximo = anterior + atual;
                anterior = atual;
                atual = proximo;
            }

            //Verifica se o numero existe na Lista
            if (lista.Contains(';'+numero.ToString()+';'))
                resultado = "O número " + numero + " existe na sequência de Fibonacci";
            else
                resultado = "O número " + numero + " não existe na sequência de Fibonacci";

            Console.WriteLine(resultado);

            // Tópico 3
            Console.WriteLine("Tópico 3");

            //carrega o arquivo json
            string json = System.IO.File.ReadAllText("dados.json");

            //decodifica o arquivo json
            var jsonObj = Newtonsoft.Json.JsonConvert.DeserializeObject<Dictionary<string, double>>(json);

            //Variaveis
            KeyValuePair<string, double> menorValor = new KeyValuePair<string, double>();
            KeyValuePair<string, double> maiorValor = new KeyValuePair<string, double>();

            //Busca o menor valor
            foreach (var item in jsonObj)
            {
                if (menorValor.Value == 0 || (item.Value < menorValor.Value && item.Value != 0))
                {
                    menorValor = item;
                }
            }

            //Busca o maior valor
            foreach (var item in jsonObj)
            {
                if (maiorValor.Value == 0 || (item.Value > maiorValor.Value && item.Value != 0))
                {
                    maiorValor = item;
                }
            }

            //Criar análise de Dados
            int semFaturamento = 0;
            int comFaturamento = 0;
            double totalFaturado = 0.0;
            double mediaFaturado = 0.0;
            List<string> diasAcimaMedia = new List<string>();

            //Conta os valores faturados e somatória
            foreach (var item in jsonObj)
            {
                if (item.Value == 0)
                    semFaturamento++;
                else
                    comFaturamento++;

                totalFaturado += item.Value;
            }

            //Cria a média dos valores faturados
            mediaFaturado = totalFaturado / comFaturamento;

            //Busca os dias acima da média
            foreach (var item in jsonObj)
            {
                if (item.Value > mediaFaturado)
                    diasAcimaMedia.Add(item.Key);
            }

            //Exibe os resultados
            Console.WriteLine("Menor Valor");
            Console.WriteLine("Dia: " + menorValor.Key + " - Valor: " + menorValor.Value);
            Console.WriteLine("Maior Valor");
            Console.WriteLine("Dia: " + maiorValor.Key + " - Valor: " + maiorValor.Value);
            Console.WriteLine("Análise de Dados");
            Console.WriteLine("Dias sem Faturamento: " + semFaturamento);
            Console.WriteLine("Dias com Faturamento: " + comFaturamento);
            Console.WriteLine("Total Faturado: " + totalFaturado);
            Console.WriteLine("Média Faturado: " + mediaFaturado);
            Console.WriteLine(diasAcimaMedia.Count + " Dias Acima da Média: " + string.Join(", ", diasAcimaMedia));

            // Tópico 4
            Console.WriteLine("Tópico 4");

            //Variaveis
            Dictionary<string, double> faturamento = new Dictionary<string, double>()
            {
                { "SP", 67836.43 },
                { "RJ", 36678.66 },
                { "MG", 29229.88 },
                { "ES", 27165.48 },
                { "Outros", 19849.53 }
            };

            Dictionary<string, double> percentual = new Dictionary<string, double>();
            double totalFaturamento = 0.0;

            //Calcula o total do faturamento
            foreach (var item in faturamento)
            {
                totalFaturamento += item.Value;
            }

            //Calcula o percentual de cada estado
            foreach (var item in faturamento)
            {
                percentual[item.Key] = (item.Value / totalFaturamento) * 100;
            }

            //Exibe o resultado
            Console.WriteLine("Faturamento");
            Console.WriteLine("Total Faturamento: " + totalFaturamento);
            Console.WriteLine("Percentual de cada estado");
            foreach (var item in percentual)
            {
                Console.WriteLine("" + item.Key + ": " + item.Value + "%");
            }

            // Tópico 5
            Console.WriteLine("Tópico 5");

            //Variaveis
            string texto = "Inverter Texto";
            string inverso = "";

            // Inverte o texto e armazena na variavel inverso
            for (int i = texto.Length - 1; i >= 0; i--)
            {
                inverso += texto[i];
            }

            //Exibe o resultado
            Console.WriteLine("Texto");
            Console.WriteLine(texto);
            Console.WriteLine("Inverso");
            Console.WriteLine(inverso);
        }
    }
}