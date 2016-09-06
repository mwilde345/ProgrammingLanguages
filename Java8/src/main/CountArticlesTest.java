package main;

import java.util.Arrays;
import java.util.List;
import java.util.Map;
import java.util.function.Function;
import java.util.stream.Collectors;
import java.util.stream.Stream;


public class CountArticlesTest {
	public static void main(String[] args){
		System.out.println("Count Articles");
		System.out.println(CountArticles("An apple a day with an ape gives the doc a surprise with an even better outcome than a purple dog."));
	}
	public static /*Map<String, Long>*/long CountArticles(String message){
		List<String> myList = Arrays.asList("a","an","the");
		List<String> themessage = Arrays.asList(message.split(" "));
		Stream<String> streams = themessage.stream();
	    /*Map<String, Long>*/Long wordCount = streams
	        		.filter(s->myList.contains(s))
	        		.count();
	                //.collect(Collectors.groupingBy(Function.identity(),Collectors.counting())); 
		return wordCount;
	}
	public boolean checkArticle(String word){
		List<String> myList = Arrays.asList("a","an","the");
		return myList.stream().anyMatch(str -> str.trim().equalsIgnoreCase(word));
	}
	
}
