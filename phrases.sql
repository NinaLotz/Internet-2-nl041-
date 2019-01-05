CREATE TABLE `phrases` (
  `ID` int(11) NOT NULL,
  `text` text NOT NULL,
  `insertdate` datetime NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `phrases` (`ID`, `text`, `insertdate`,) VALUES
(1, 'I Say YES! to Große Gelbe Zebras', '2018-12-12 17:44:23'),
(2, 'I Say YES! to Dicke Gelbe Zebras', '2018-12-12 17:44:35'),
(3, 'I Say YES! to Dicke Gelbe Zebras', '2018-12-12 17:44:47');


ALTER TABLE `phrases`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `phrases`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;