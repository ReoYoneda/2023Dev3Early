package A_sql.Insert_evaluation;

import java.io.BufferedWriter;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStreamWriter;
import java.util.Random;

public class Echo5 {
    public static void main(String[] args) {
        String s = "INSERT INTO `evaluation`(`user_id`, `evaluation_trp`, `evaluation_receivednum`, `evaluation_receivedvalue`, `evaluation_sentnum`, `evaluation_sentvalue`)\nVALUES\n";
        double id, trp, num, Rvalue, Svalue;
        Random random = new Random();

        for(double x=1; x<=8; x++){
            for(double y=1; y<=8; y++){
                for(double z=1; z<=8; z++){
                    id = (x-1)*8*8+(y-1)*8+z;
                    
                    trp = generateRandomNumber(random);
                    num = (int)Math.sqrt(trp*5-9);
                    if(num!=0){
                        Rvalue = num*num/(num/2)*(id/1024)+num*3.5;
                        Svalue = -num*num/(num/2)*(id/1024)+num*4.5;
                    }else{
                        Rvalue = 0;
                        Svalue = 0;
                    }
                    
                    s += "                        ("+(int)id+","+(int)trp+","+(int)num+","+(int)Rvalue+","+(int)num+","+(int)Svalue+"),\n";

                }
            }
        }
        s = s.substring(0,s.length()-2);

        String filePath = "A_sql/Insert_evaluation/Insert_evaluation.txt";

        try {
            // 文字エンコーディングを指定してファイルに書き込む
            BufferedWriter writer = new BufferedWriter(
                    new OutputStreamWriter(new FileOutputStream(filePath), "UTF-8"));

            String text = s; // 出力するテキスト

            // ファイルにテキストを書き込む
            writer.write(text);

            // ファイルを閉じる
            writer.close();

            System.out.println("ファイルに書き込みが完了しました。");
        } catch (IOException e) {
            System.out.println("ファイル書き込みエラー: " + e.getMessage());
        }
    }

    private static int generateRandomNumber(Random random) {
        int maxNumber = 1800;
        while (true) {
        int randomNumber = random.nextInt(maxNumber + 1);
        double probability;

        if (randomNumber == 0) {
            probability = 0.025; // 0の出現率を2.5%に設定
        } else if (randomNumber >= 1 && randomNumber <= 20) {
            probability = 0.005; // 出現率を0.5%に設定
        } else {
            probability = 1.0 / Math.pow(randomNumber, 1.0 / 0.6);
        }

        if (random.nextDouble() <= probability) {
            return randomNumber;
        }
    }
    }
}